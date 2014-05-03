<?php

class SubCategoriaForm extends CFormModel {

    public $nome;
    public $categoriaForm;
    public $categoriaFormArrayKey;

    public function rules() {
        return array(
            array('nome, categoriaForm, categoriaFormArrayKey', 'safe'),
        );
    }

    public function getNomeDeCategoriaForm()
    {
        return $this->categoriaForm['nome'];
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
                            'name' => 'SubCategoriaForm[nome][]',
                            'maxlength'=>50,
                            'hint' => Yii::t('site', 'mínimo 4 caracteres e máximo 50 caracteres; somente letras e números'),
                        )
                    ),
                    CHtml::activeDropDownList($this, 'categoriaFormArrayKey', $this->getNomeDeCategoriaForm(), array('name' => 'SubCategoriaForm[categoriaFormArrayKey][]')),
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