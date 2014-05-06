<?php

/**
 * Description of SegmentoHelper
 *
 * @author marco
 */
class SegmentoHelper
{
    public static function renderizaSegmento($aSegmento, $oController)
    {
        $html = '';
        foreach ($aSegmento as $oSegmento) {
            $oSegmento instanceof Segmento;
            if (empty($oSegmento->categorias)) {
                continue;
            }
            $html .= "<div style='display: none;' class=\"span12\" id='Pesquisa_Segmento_" . $oSegmento->id . "'>&nbsp;";
            $html .= CHtml::tag('h3', array(), $oSegmento->nome);
            $html .= self::renderizaCategoria($oSegmento->categorias, $oController);
            $html .= '</div>';
        }
        return $html;
    }

    public static function renderizaCategoria($aCategoria, $oController)
    {
        $html = '<div>';
        foreach ($aCategoria as $oCategoria) {
            $oCategoria instanceof Categoria;
            if (empty($oCategoria->subCategorias)) {
                continue;
            }
            $html .= CHtml::tag('h5', array(), $oCategoria->nome);
            $html .= "<div style='border-bottom: dotted;'></div>";
            $html .= self::renderizaSubCategoria($oCategoria->subCategorias, $oController);
        }
        $html .= '</div>';
        return $html;
    }

    public static function renderizaSubCategoria($aSubCategoria, $oController)
    {
        $html = '';
        $oController instanceof PesquisaController;
        foreach ($aSubCategoria as $oSubCategoria) {
            $oSubCategoria instanceof SubCategoria;
            $html .="<div class='row-fluid'>";
            $html .="    <div id='" . $oSubCategoria->id . "' class='span8' >" . $oSubCategoria->nome . " &nbsp;";
            $html .="    </div>";
            $html .="    <div class='btn-group span4'>";
            $html .= "<input name='Pesquisa[Pergunta_" . $oSubCategoria->id . "]' type='hidden' id='Pesquisa_Pergunta_" . $oSubCategoria->id . "_hidden' value='false'>";
            $html .= $oController->widget(
                'bootstrap.widgets.TbSelect2',
                array(
                    'name' => 'selectInput',
                    'options'=>array(
                        'placeholder'=>'Digite uma prestadora',
                        'allowClear'=>true,
                        'width' => '100%',
                    ),
                    'htmlOptions' => array(
                        'id' => 'Prestadora_Pergunta_' . $oSubCategoria->id,
                    ),
                    'data'=> CHtml::listData(Prestadora::model()->findAll(), 'id', 'descricao'),
                ),
                true
            );
//            $html .="        <a class='btn btn-info btn-mini'>1</a>";
//            $html .="        <a class='btn btn-info btn-mini'>2</a>";
//            $html .="        <a class='btn btn-info btn-mini'>3</a>";
//            $html .="        <a class='btn btn-info btn-mini'>4</a>";
//            $html .="        <a class='btn btn-info btn-mini'>5</a>";
            $html .="    </div>";
            $html .="</div>";
        }
        return $html;
    }

}
