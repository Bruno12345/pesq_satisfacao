<?php

class m140416_010534_criacao_tabela_categoria extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('categoria', array(
			'id' => 'serial NOT NULL primary key',
			'nome' => 'varchar',
			'segmento_id' => 'integer references segmento (id)',
		));
	}

	public function safeDown()
	{
		$this->dropTable('categoria');
	}
}