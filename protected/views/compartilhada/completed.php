<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'completed-form',
        'enableAjaxValidation' => false,
        'method' => 'post',
        'type' => 'horizontal',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        )
    ));
    ?>
    <fieldset>
        <legend>
            <?php echo CHtml::tag('p', array(), Yii::t('site', 'Resumo:')); ?>
        </legend>
        <div class="control-group well">
            <div class="span4">

                <?php
                foreach ($event->data as $step => $data) {
                    $modelName = ucfirst($step);
                    $model = new $modelName();
                    echo CHtml::tag('h4', array(), $event->sender->getStepLabel($step));
                    echo ('<ul>');
                    foreach ($data as $k => $v) {
                        if (strcmp('categoriaForm', $k) == 0) {
                            continue;
                        }
                        if (is_array($v)) {
                            echo '<li>' . $model->getAttributeLabel($k) . ":</li>";
                            foreach ($v as $valor) {
                                echo CHtml::hiddenField('Data[' . $modelName . '][' . $k . '][]', $valor);
                                echo "<li>$valor</li>";
                            }
                        } else {
                            echo '<li>' . $model->getAttributeLabel($k) . ":$v</li>";
                            echo CHtml::hiddenField('Data[' . $modelName . '][' . $k . ']', $v);
                        }
                    }
                    echo ('</ul>');
                }
                ?>
            </div>
        </div>

        <div class="form-actions">
            <?php
            echo CHtml::hiddenField('Segmento[WizardCompleted]', true);
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'icon' => 'ok white',
                'label' => Yii::t('site', 'Salvar'),
            ));
            ?>
        </div>
    </fieldset>
    <?php $this->endWidget(); ?>
</div>
