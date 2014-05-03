<?php

/**
 * This is the model class for table "prestadora".
 *
 * The followings are the available columns in table 'prestadora':
 * @property integer $id
 * @property integer $cnpj
 * @property string $razao_social
 * @property string $nome_fantasia
 * @property string $email
 * @property integer $endereco_id
 *
 * The followings are the available model relations:
 * @property Endereco $endereco
 * @property PesquisaSubCategoriaPrestadora[] $pesquisaSubCategoriaPrestadoras
 */
class Prestadora extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prestadora';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cnpj', 'required'),
			array('cnpj, endereco_id', 'numerical', 'integerOnly'=>true),
			array('razao_social, nome_fantasia, email', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cnpj, razao_social, nome_fantasia, email, endereco_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'endereco' => array(self::BELONGS_TO, 'Endereco', 'endereco_id'),
			'pesquisaSubCategoriaPrestadoras' => array(self::HAS_MANY, 'PesquisaSubCategoriaPrestadora', 'prestadora_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cnpj' => 'Cnpj',
			'razao_social' => 'Razao Social',
			'nome_fantasia' => 'Nome Fantasia',
			'email' => 'Email',
			'endereco_id' => 'Endereco',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cnpj',$this->cnpj);
		$criteria->compare('razao_social',$this->razao_social,true);
		$criteria->compare('nome_fantasia',$this->nome_fantasia,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('endereco_id',$this->endereco_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prestadora the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
