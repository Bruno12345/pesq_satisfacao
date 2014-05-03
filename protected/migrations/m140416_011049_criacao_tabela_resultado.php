<?php

class m140416_011049_criacao_tabela_resultado extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('resultado', array(
			'id' => 'serial NOT NULL primary key',
			'voto' => 'integer not null',
			'cliente_id' => 'integer references cliente (id)',
			'pesquisa_sub_categoria_prestadora_id' => 'integer references pesquisa_sub_categoria_prestadora (id)',
		));
	}

	public function safeDown()
	{
		$this->dropTable('resultado');
	}
}