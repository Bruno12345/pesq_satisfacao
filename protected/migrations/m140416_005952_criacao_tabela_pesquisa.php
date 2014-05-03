<?php

class m140416_005952_criacao_tabela_pesquisa extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('pesquisa', array(
			'id' => 'serial NOT NULL primary key',
			'nome' => 'varchar',
		));
	}

	public function safeDown()
	{
		$this->dropTable('pesquisa');
	}
}