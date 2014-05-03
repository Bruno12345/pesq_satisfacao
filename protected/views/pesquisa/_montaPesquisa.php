<h1>Escolha as perguntas</h1>
<div>

    <div class="form">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'pergunta-form',
            'enableAjaxValidation' => false,
            'method' => 'post',
            'type' => 'horizontal',
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data'
            )
        ));
        $form instanceof TbActiveForm;
        ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span4">
                    <?php
                        $aCheckButton = array();
                        foreach ($aSegmento as $oSegmento) {
                            $oSegmento instanceof Segmento;
                            $aCheckButton[] = array(
                                'label' => $oSegmento->nome,
                                'htmlOptions' => array(
                                    'onclick' => 'js:jQuery(this).toggleClass("btn-primary btn-success");'
                                    . 'adicionaPerguntas(' . $oSegmento->id . ', jQuery(this).hasClass("active"));'
                                ),
                            );
                        }
                        $this->widget(
                            'bootstrap.widgets.TbButtonGroup',
                            array(
                                'toggle' => 'checkbox',
                                'type' => 'primary',
                                'stacked' => true,
                                'buttons' => $aCheckButton,
                            )
                        );
                    ?>
                </div>
                <div class="span8">
                    <div class="row-fluid" id="bodyContentQuestion" style="border-left: solid; ">
                        <?php echo SegmentoHelper::renderizaSegmento($aSegmento); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
