<h1>Escolha o cliente</h1>
<div>

    <div class="form">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'clienteParaPesquisa-form',
            'enableAjaxValidation' => false,
            'method' => 'post',
            'type' => 'horizontal',
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data'
            )
        ));
        $form instanceof TbActiveForm;
        ?>
        <fieldset id="clienteParaPesquisa">
            <div class="control-group">
                <div class="span4"><span class="required">*</span>
                    <?php
                    $this->widget('bootstrap.widgets.TbSelect2', array(
                        'name' => 'selectInput',
                        'options'=>array(
                            'placeholder'=>'Digite um cliente',
                            'allowClear'=>true,
                        ),
                        'htmlOptions' => array(
                            'id' => 'cliente-id'
                        ),
                        'data'=>$listaCliente
                    ));
                    ?>
                </div>
            </div>
        </fieldset>

        <?php $this->endWidget(); ?>

    </div>
</div>