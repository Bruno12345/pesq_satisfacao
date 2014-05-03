<?php

/**
 * This is the model class for table "resultado".
 *
 * The followings are the available columns in table 'resultado':
 * @property integer $id
 * @property integer $voto
 * @property integer $cliente_id
 * @property integer $pesquisa_sub_categoria_prestadora_id
 *
 * The followings are the available model relations:
 * @property Cliente $cliente
 * @property PesquisaSubCategoriaPrestadora $pesquisaSubCategoriaPrestadora
 */
class Resultado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'resultado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('voto', 'required'),
			array('voto, cliente_id, pesquisa_sub_categoria_prestadora_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, voto, cliente_id, pesquisa_sub_categoria_prestadora_id', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'cliente_id'),
			'pesquisaSubCategoriaPrestadora' => array(self::BELONGS_TO, 'PesquisaSubCategoriaPrestadora', 'pesquisa_sub_categoria_prestadora_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'voto' => 'Voto',
			'cliente_id' => 'Cliente',
			'pesquisa_sub_categoria_prestadora_id' => 'Pesquisa Sub Categoria Prestadora',
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
		$criteria->compare('voto',$this->voto);
		$criteria->compare('cliente_id',$this->cliente_id);
		$criteria->compare('pesquisa_sub_categoria_prestadora_id',$this->pesquisa_sub_categoria_prestadora_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resultado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
