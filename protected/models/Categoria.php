<?php

/**
 * This is the model class for table "categoria".
 *
 * The followings are the available columns in table 'categoria':
 * @property integer $id
 * @property string $nome
 * @property integer $segmento_id
 * @property integer $desativado
 *
 * The followings are the available model relations:
 * @property Segmento $segmento
 * @property SubCategoria[] $subCategorias
 */
class Categoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desativado,segmento_id, foreignKey', 'numerical', 'integerOnly'=>true),
			array('nome, segmento_id,foreignKey', 'safe'),
			array('nome', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, segmento_id, desativado', 'safe', 'on'=>'search'),
			array('id, nome, segmento_id, desativado', 'safe', 'on'=>'search'),
			array('nome', 'validaChaveCategoria'),
		);
	}

	public function validaChaveCategoria(){
		$criteria = new CDbCriteria();
		$criteria->addCondition("segmento_id = {$this->segmento_id} AND desativado = 0 AND nome = '{$this->nome}'");
		if(!$this->isNewRecord){
			$criteria->addCondition("id != {$this->id}");
		}
		
		if(Categoria::model()->exists($criteria)){
			$this->addError("nome", Yii::t('sistema',"Categoria existente para este segmento!"));
		}
	}
	
	public function desativado() {
		
		return $this->updateByPk($this->id,array('desativado' => 1));
	}

	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'segmento' => array(self::BELONGS_TO, 'Segmento', 'segmento_id'),
			'subCategorias' => array(self::HAS_MANY, 'SubCategoria', 'categoria_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'segmento_id' => 'Segmento',
			'desativado' => 'Desativado',
		);
	}

	

	public function defaultScope()
    {
		return array(
			'condition'=>'"categoria".desativado = 0 ',
			'alias'=> "categoria"
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
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('segmento_id',$this->segmento_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function setForeignKey($foreignKey)
    {
        $this->segmento_id = $foreignKey;
    }

    public function getForeignKey()
    {
        return $this->segmento_id;
    }

    public function delete() {
        $this->scenario = 'delete';
        $this->desativado = 0;
        return $this->save();
    }

	
	public function categoriaSemSubCategoria(){
		$criteria=new CDbCriteria;
		$criteria->addCondition('"subCategorias".categoria_id is null');
		$criteria->with = array('subCategorias');
		$this->getDbCriteria()->mergeWith($criteria);
		return $this;
	}
	
	public function doSegmento($segmento_id){
		$criteria=new CDbCriteria;
		$criteria->addCondition('segmento_id = ' . $segmento_id);
		$this->getDbCriteria()->mergeWith($criteria);
		return $this;
	}
	
	public function adicionaErroMinimoUmaCategoria() {
		$this->addError("nome", Yii::t("sistema", "Inclua no mínimo uma única categoria"));
	}

	public static function buscaTodasAsCategoriasDeUmSegmento($segmento_id = null) {
		$criteria = new CDbCriteria();
		if(!is_null($segmento_id)){
			$criteria->addCondition("segmento_id = {$segmento_id}");	
		}
		return CHtml::listData(Categoria::model()->findAll($criteria), 'id', 'nome');
	}

}
