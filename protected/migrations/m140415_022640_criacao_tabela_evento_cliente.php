<?php

class m140415_022640_criacao_tabela_evento_cliente extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('evento_cliente', array(
			'id' => 'serial NOT NULL primary key',
			'evento_id' => 'integer references evento (id)',
			'cliente_id' => 'integer references cliente (id)',
		));
	}

	public function safeDown()
	{
		$this->dropTable('evento_cliente');
	}
}