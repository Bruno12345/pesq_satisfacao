<?php

class m140418_180445_add_boolean_column_desativado_on_all_table extends CDbMigration {

    public function safeUp() {
        $this->addColumn('categoria', 'desativado', 'integer default 0');
        $this->addColumn('cliente', 'desativado', 'integer default 0');
        $this->addColumn('endereco', 'desativado', 'integer default 0');
        $this->addColumn('evento', 'desativado', 'integer default 0');
        $this->addColumn('evento_cliente', 'desativado', 'integer default 0');
        $this->addColumn('periodo_evento', 'desativado', 'integer default 0');
        $this->addColumn('pesquisa', 'desativado', 'integer default 0');
        $this->addColumn('pesquisa_sub_categoria_prestadora', 'desativado', 'integer default 0');
        $this->addColumn('prestadora', 'desativado', 'integer default 0');
        $this->addColumn('resultado', 'desativado', 'integer default 0');
        $this->addColumn('segmento', 'desativado', 'integer default 0');
        $this->addColumn('sub_categoria', 'desativado', 'integer default 0');
    }

    public function safeDown() {

        $this->dropColumn('categoria', 'desativado');
        $this->dropColumn('cliente', 'desativado');
        $this->dropColumn('endereco', 'desativado');
        $this->dropColumn('evento', 'desativado');
        $this->dropColumn('evento_cliente', 'desativado');
        $this->dropColumn('periodo_evento', 'desativado');
        $this->dropColumn('pesquisa', 'desativado');
        $this->dropColumn('pesquisa_sub_categoria_prestadora', 'desativado');
        $this->dropColumn('prestadora', 'desativado');
        $this->dropColumn('resultado', 'desativado');
        $this->dropColumn('segmento', 'desativado');
        $this->dropColumn('sub_categoria', 'desativado');
    }
}
