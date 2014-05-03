<?php

class CategoriaForm extends CFormModel {

    public $nome;

    public function rules() {
        return array(
            array('nome', 'safe'),
        );
    }

    public function getForm() {
        return new TbFormModal(
            array(
                'showErrorSummary' => true,
                'elements' => array(
                    CHtml::activeLabel($this, 'nome').
                    CHtml::activeTextField(
                        $this,
                        'nome',
                        array(
                            'name' => 'CategoriaForm[nome][]',
                            'maxlength'=>50,
                            'hint' => Yii::t('site', 'mínimo 4 caracteres e máximo 50 caracteres; somente letras e números'),
                        )
                    ),
                ),
                'buttons' => array(
                    'submit' => array(
                        'buttonType'=>'submit',
                        'type'=>'primary',
                        'label' => Yii::t('site', 'Próximo'),
                        'icon'=>'ok white arrow-right',
                    ),
                ),
            ),
        $this);
    }
}
