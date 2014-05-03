<?php

class m140416_010129_criacao_tabela_periodo_evento extends CDbMigration
{
// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('periodo_evento', array(
			'id' => 'serial NOT NULL primary key',
			'data_inicial' => 'timestamp',
			'data_final' => 'timestamp',
			'email' => 'varchar',
			'evento_id' => 'integer references evento (id)',
			'pesquisa_id' => 'integer references pesquisa (id)',
		));
	}

	public function safeDown()
	{
		$this->dropTable('periodo_evento');
	}
}