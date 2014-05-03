<?php

class m140415_022629_criacao_tabela_cliente extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('cliente', array(
			'id' => 'serial NOT NULL primary key',
			'cnpj' => 'integer not null',
			'razao_social' => 'varchar',
			'nome_fantasia' => 'varchar',
			'email' => 'varchar',
			'endereco_id' => 'integer references endereco (id)',
		));
	}

	public function safeDown()
	{
		$this->dropTable('cliente');
	}
}