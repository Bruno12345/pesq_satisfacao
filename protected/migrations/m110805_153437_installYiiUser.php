<?php

class m110805_153437_installYiiUser extends CDbMigration
{
	//protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8';
    private $_model;
    
	public function safeUp()
	{
        if (!Yii::app()->getModule('user')) {
            echo "\n\nAdd to console.php :\n"
                 ."'modules'=>array(\n"
                 ."...\n"
                 ."    'user'=>array(\n"
                 ."        ... # copy settings from main config\n"
                 ."    ),\n"
                 ."...\n"
                 ."),\n"
                 ."\n";
            return false;
        }
        Yii::import('user.models.User');
        //*
        switch ($this->dbType()) {
            case "pgsql":
                    $this->createTable(Yii::app()->getModule('user')->tableUsers, array(
                        "id" => "serial not null primary key",
                        "username" => "varchar(20) NOT NULL DEFAULT ''",
                        "password" => "varchar(128) NOT NULL DEFAULT ''",
                        "email" => "varchar(128) NOT NULL DEFAULT ''",
                        "activkey" => "varchar(128) NOT NULL DEFAULT ''",
                        "superuser" => "integer NOT NULL DEFAULT 0",
                        "status" => "integer NOT NULL DEFAULT 0",
                    ));
				
                    $this->addColumn(Yii::app()->getModule('user')->tableUsers,'create_at',"TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
                    $this->addColumn(Yii::app()->getModule('user')->tableUsers,'lastvisit_at',"TIMESTAMP");
					
                    $this->createIndex('user_username', Yii::app()->getModule('user')->tableUsers, 'username', true);
                    $this->createIndex('user_email', Yii::app()->getModule('user')->tableUsers, 'email', true);
                    $this->createTable(Yii::app()->getModule('user')->tableProfiles, array(
                        'user_id' => 'serial not null primary key',
                        'first_name' => 'string',
                        'last_name' => 'string',
                    ));
                    $this->addForeignKey('user_profile_id', Yii::app()->getModule('user')->tableProfiles, 'user_id', Yii::app()->getModule('user')->tableUsers, 'id', 'CASCADE', 'RESTRICT');
                    $this->createTable(Yii::app()->getModule('user')->tableProfileFields, array(
                        "id" => "serial not null primary key",
                        "varname" => "varchar(50) NOT NULL DEFAULT ''",
                        "title" => "varchar(255) NOT NULL DEFAULT ''",
                        "field_type" => "varchar(50) NOT NULL DEFAULT ''",
                        "field_size" => "integer NOT NULL DEFAULT 0",
                        "field_size_min" => "integer NOT NULL DEFAULT 0",
                        "required" => "integer NOT NULL DEFAULT 0",
                        "match" => "varchar(255) NOT NULL DEFAULT ''",
                        "range" => "varchar(255) NOT NULL DEFAULT ''",
                        "error_message" => "varchar(255) NOT NULL DEFAULT ''",
                        "other_validator" => "text",
                        "default" => "varchar(255) NOT NULL DEFAULT ''",
                        "widget" => "varchar(255) NOT NULL DEFAULT ''",
                        "widgetparams" => "text",
                        "position" => "integer NOT NULL DEFAULT 0",
                        "visible" => "integer NOT NULL DEFAULT 0",
                    ));
                break;
        }//*/

        if (in_array('--interactive=0',$_SERVER['argv'])) {
            $this->_model->username = 'admin';
            $this->_model->email = 'webmaster@example.com';
            $this->_model->password = 'admin';
        } else {
            $this->readStdinUser('Admin login', 'username', 'admin');
            $this->readStdinUser('Admin email', 'email', 'webmaster@example.com');
            $this->readStdinUser('Admin password', 'password', 'admin');
        }

        $this->insert(Yii::app()->getModule('user')->tableUsers, array(
            "id" => "1",
            "username" => $this->_model->username,
            "password" => Yii::app()->getModule('user')->encrypting($this->_model->password),
            "email" => "webmaster@example.com",
            "activkey" => Yii::app()->getModule('user')->encrypting(microtime()),
            "superuser" => "1",
            "status" => "1",
        ));

        $this->insert(Yii::app()->getModule('user')->tableProfiles, array(
            "user_id" => "1",
            "first_name" => "Administrator",
            "last_name" => "Admin",
        ));

		$this->insert(Yii::app()->getModule('user')->tableProfileFields, array(
            "id" => "1",
            "varname" => "first_name",
            "title" => "First Name",
            "field_type" => "VARCHAR",
            "field_size" => "255",
            "field_size_min" => "3",
            "required" => "2",
            "match" => "",
            "range" => "",
            "error_message" => "Incorrect First Name (length between 3 and 50 characters).",
            "other_validator" => "",
            "default" => "",
            "widget" => "",
            "widgetparams" => "",
            "position" => "1",
            "visible" => "3",
        ));
		$this->insert(Yii::app()->getModule('user')->tableProfileFields, array(
            "id" => "2",
            "varname" => "last_name",
            "title" => "Last Name",
            "field_type" => "VARCHAR",
            "field_size" => "255",
            "field_size_min" => "3",
            "required" => "2",
            "match" => "",
            "range" => "",
            "error_message" => "Incorrect Last Name (length between 3 and 50 characters).",
            "other_validator" => "",
            "default" => "",
            "widget" => "",
            "widgetparams" => "",
            "position" => "2",
            "visible" => "3",
        ));
	}

	public function safeDown()
	{
		return true;
        $this->dropTable(Yii::app()->getModule('user')->tableProfileFields);
        $this->dropTable(Yii::app()->getModule('user')->tableProfiles);
        $this->dropTable(Yii::app()->getModule('user')->tableUsers);
	}

    public function dbType()
    {
        list($type) = explode(':',Yii::app()->db->connectionString);
        echo "type db: ".$type."\n";
        return $type;
    }

    private function readStdin($prompt, $valid_inputs, $default = '') {
        while(!isset($input) || (is_array($valid_inputs) && !in_array($input, $valid_inputs)) || ($valid_inputs == 'is_file' && !is_file($input))) {
            echo $prompt;
            $input = strtolower(trim(fgets(STDIN)));
            if(empty($input) && !empty($default)) {
                $input = $default;
            }
        }
        return $input;
    }

    private function readStdinUser($prompt, $field, $default = '') {
        if (!$this->_model)
            $this->_model = new User;

        while(!isset($input) || !$this->_model->validate(array($field))) {
            echo $prompt.(($default)?" [$default]":'').': ';
            $input = (trim(fgets(STDIN)));
            if(empty($input) && !empty($default)) {
                $input = $default;
            }
            $this->_model->setAttribute($field,$input);
        }
        return $input;
    }
}