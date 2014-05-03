<?php

class m140416_010527_criacao_tabela_segmento extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('segmento', array(
			'id' => 'serial NOT NULL primary key',
			'nome' => 'varchar',
		));
	}

	public function safeDown()
	{
		$this->dropTable('segmento');
	}
}