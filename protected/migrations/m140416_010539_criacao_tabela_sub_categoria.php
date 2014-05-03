<?php

class m140416_010539_criacao_tabela_sub_categoria extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('sub_categoria', array(
			'id' => 'serial NOT NULL primary key',
			'nome' => 'varchar',
			'categoria_id' => 'integer references categoria (id)',
		));
	}

	public function safeDown()
	{
		$this->dropTable('sub_categoria');
	}
}