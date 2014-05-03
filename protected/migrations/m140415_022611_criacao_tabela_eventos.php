<?php

class m140415_022611_criacao_tabela_eventos extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('evento', array(
										'id'	=>	'serial NOT NULL primary key',
										'descricao'	=>	'varchar',
										'tag'	=> 'varchar',
		));
	}

	public function safeDown()
	{
		$this->dropTable('evento');
	}
}