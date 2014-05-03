<?php

class m140425_034008_excluindo_chave_unica_nome_tabelas extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->dropColumn('segmento', 'nome');
		$this->dropColumn('categoria', 'nome');
		$this->dropColumn('sub_categoria', 'nome');
		
		$this->addColumn('segmento', 'nome', 'varchar');
		$this->addColumn('categoria', 'nome', 'varchar');
		$this->addColumn('sub_categoria', 'nome', 'varchar');
		
	}

	public function safeDown()
	{
		return true;
	}
}