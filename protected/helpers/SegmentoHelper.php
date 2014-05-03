<?php

/**
 * Description of SegmentoHelper
 *
 * @author marco
 */
class SegmentoHelper
{
    public static function renderizaSegmento($aSegmento)
    {
        $html = '';
        foreach ($aSegmento as $oSegmento) {
            $oSegmento instanceof Segmento;
            if (empty($oSegmento->categorias)) {
                continue;
            }
            $html .= "<input name='Pesquisa[Segmento_" . $oSegmento->id . "]' type='hidden' id='" . $oSegmento->id . "_hidden'>";
            $html .= "<div style='display: none;' class=\"span12\" id='" . $oSegmento->id . "'>&nbsp;";
            $html .= CHtml::tag('h3', array(), $oSegmento->nome);
            //$html .= "<div style='border-bottom: solid;'></div>";
            $html .= self::renderizaCategoria($oSegmento->categorias);
            $html .= '</div>';
        }
        return $html;
    }

    public static function renderizaCategoria($aCategoria)
    {
        $html = '<div>';
        foreach ($aCategoria as $oCategoria) {
            $oCategoria instanceof Categoria;
            if (empty($oCategoria->subCategorias)) {
                continue;
            }
            $html .= CHtml::tag('h5', array(), $oCategoria->nome);
            //$html .= CHtml::tag('div', array('style'=>'border-bottom: solid'));
            $html .= "<div style='border-bottom: dotted;'></div>";
            $html .= self::renderizaSubCategoria($oCategoria->subCategorias);
        }
        $html .= '</div>';
        return $html;
    }

    public static function renderizaSubCategoria($aSubCategoria)
    {
        $html = '';
        foreach ($aSubCategoria as $oSubCategoria) {
            $oSubCategoria instanceof SubCategoria;
            $html .="<div class='row-fluid'>";
            $html .="    <div id='" . $oSubCategoria->id . "' class='span8' >" . $oSubCategoria->nome . " &nbsp;";
            $html .="    </div>";
            $html .="    <div class='btn-group span4'>";
            $html .="        <a class='btn btn-info btn-mini'>1</a>";
            $html .="        <a class='btn btn-info btn-mini'>2</a>";
            $html .="        <a class='btn btn-info btn-mini'>3</a>";
            $html .="        <a class='btn btn-info btn-mini'>4</a>";
            $html .="        <a class='btn btn-info btn-mini'>5</a>";
            $html .="    </div>";
            $html .="</div>";
        }
        return $html;
    }

}
