<?php

class m140415_022620_criacao_tabela_endereco extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('endereco', array(
			'id' => 'serial NOT NULL primary key',
			'logradouro' => 'varchar',
			'bairro' => 'varchar',
			'uf' => 'varchar(2)',
			'cep' => 'integer',
		));
	}

	public function safeDown()
	{
		$this->dropTable('endereco');
	}
}