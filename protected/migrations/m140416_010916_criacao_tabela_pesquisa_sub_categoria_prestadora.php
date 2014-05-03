<?php

class m140416_010916_criacao_tabela_pesquisa_sub_categoria_prestadora extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('pesquisa_sub_categoria_prestadora', array(
			'id' => 'serial NOT NULL primary key',
			'sub_categoria_id' => 'integer references sub_categoria (id)',
			'pesquisa_id' => 'integer references pesquisa (id)',
			'prestadora_id' => 'integer references prestadora (id)',
		));
	}

	public function safeDown()
	{
		$this->dropTable('pesquisa_sub_categoria_prestadora');
	}
}