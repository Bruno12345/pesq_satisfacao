<?php

/**
 * This is the model class for table "pesquisa_sub_categoria_prestadora".
 *
 * The followings are the available columns in table 'pesquisa_sub_categoria_prestadora':
 * @property integer $id
 * @property integer $sub_categoria_id
 * @property integer $pesquisa_id
 * @property integer $prestadora_id
 *
 * The followings are the available model relations:
 * @property SubCategoria $subCategoria
 * @property Pesquisa $pesquisa
 * @property Prestadora $prestadora
 * @property Resultado[] $resultados
 */
class PesquisaSubCategoriaPrestadora extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pesquisa_sub_categoria_prestadora';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sub_categoria_id, pesquisa_id, prestadora_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sub_categoria_id, pesquisa_id, prestadora_id', 'safe'),
			array('id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'subCategoria' => array(self::BELONGS_TO, 'SubCategoria', 'sub_categoria_id'),
			'pesquisa' => array(self::BELONGS_TO, 'Pesquisa', 'pesquisa_id'),
			'prestadora' => array(self::BELONGS_TO, 'Prestadora', 'prestadora_id'),
			'resultados' => array(self::HAS_MANY, 'Resultado', 'pesquisa_sub_categoria_prestadora_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sub_categoria_id' => 'Sub Categoria',
			'pesquisa_id' => 'Pesquisa',
			'prestadora_id' => 'Prestadora',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('sub_categoria_id',$this->sub_categoria_id);
		$criteria->compare('pesquisa_id',$this->pesquisa_id);
		$criteria->compare('prestadora_id',$this->prestadora_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PesquisaSubCategoriaPrestadora the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function defaultScope()
    {
        return array(
            'condition'=> '"pesquisaSubCategoriaPrestadora".desativado = 0 ',
            'alias'=> "pesquisaSubCategoriaPrestadora",
        );
    }

    public static function criaOuAtualizaPergunta($aPesquisa)
    {
        if (empty($aPesquisa)) {
            return false;
        }
        foreach ($aPesquisa['Pergunta'] as $oPergunta) {
            $attribute = array(
                'sub_categoria_id' => $oPergunta->id,
                'pesquisa_id' => $aPesquisa['Pesquisa'],
                'prestadora_id' => $aPesquisa['Prestadora'],
            );
            $oPesquisa = PesquisaSubCategoriaPrestadora::model()->findByAttributes($attribute);
            if (empty($oPesquisa)) {
                $oPesquisa = new PesquisaSubCategoriaPrestadora();
                $oPesquisa->attributes = $attribute;
            }
            if (!$oPesquisa->save()) {
                return false;
            }
        }
        return true;
    }

}
