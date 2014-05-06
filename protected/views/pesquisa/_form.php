<h1>Nome da pesquisa</h1>
<div>

    <div class="form" id="div-form-pesquisa">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'pesquisa-form',
            'enableAjaxValidation' => false,
            'method' => 'post',
            'type' => 'horizontal',
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data'
            )
        ));
        $form instanceof TbActiveForm;
        ?>
        <fieldset id="pesquisa">
            <legend>
                <h4 class="note">Campos com <span class="required">*</span> são obrigatórios.</h4>
            </legend>

            <div id="mensagem-pesquisa">
                <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span3')); ?>
            </div>

            <div class="control-group">		
                <div class="span4">
                    <?php echo $form->hiddenField($model, 'id', array('id' => 'pesquisa-id')); ?>
                    <?php echo $form->textFieldRow($model, 'nome'); ?>

                </div>   
            </div>
        </fieldset>

        <?php $this->endWidget(); ?>

    </div>
</div>