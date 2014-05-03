<?php

class SegmentoForm extends CFormModel {

    public $nome;

    public function rules() {
        return array(
            array('nome', 'required'),
            array('nome', 'length', 'min' => 4, 'max' => 50),
        );
    }

    public function getForm() {
        return new TbForm(
            array(
                'showErrorSummary' => true,
                'elements' => array(
                    'nome' => array(
                        'type'=>'text',
                            'maxlength'=>50,
                            'hint' => Yii::t('site', 'mínimo 4 caracteres e máximo 50 caracteres; somente letras e números'),
                        'visible' => true,
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
