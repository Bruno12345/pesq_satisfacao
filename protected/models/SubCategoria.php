<?php

/**
 * This is the model class for table "sub_categoria".
 *
 * The followings are the available columns in table 'sub_categoria':
 * @property integer $id
 * @property string $nome
 * @property integer $categoria_id
 * @property integer $desativado
 * 
 * The followings are the available model relations:
 * @property PesquisaSubCategoriaPrestadora[] $pesquisaSubCategoriaPrestadoras
 * @property Categoria $categoria
 */
class SubCategoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sub_categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoria_id, desativado,foreignKey', 'numerical', 'integerOnly'=>true),
			array('nome, foreignKey', 'safe'),
			array('nome', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, desativado, categoria_id', 'safe', 'on'=>'search'),
			array('nome', 'validaChaveSubCategoria'),
		);
	}

	public function validaChaveSubCategoria(){
		$criteria = new CDbCriteria();
		$criteria->addCondition("categoria_id = {$this->categoria_id} AND desativado = 0 AND nome = '{$this->nome}'");
		if(!$this->isNewRecord){
			$criteria->addCondition("id != {$this->id}");
		}
		
		if(self::model()->exists($criteria)){
			$this->addError("nome", Yii::t('sistema',"Subcategoria existente para esta categoria!"));
		}
	}

	public function defaultScope()
    {
		return array(
			'condition'=>'"subCategorias".desativado = 0 ',
			'alias'=> "subCategorias"
		);
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
			'pesquisaSubCategoriaPrestadoras' => array(self::HAS_MANY, 'PesquisaSubCategoriaPrestadora', 'sub_categoria_id'),
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_id'),
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
			'categoria_id' => 'Categoria',
			'desativado' => 'Desativado',
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
		$criteria->compare('categoria_id',$this->categoria_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SubCategoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function setForeignKey($foreignKey)
    {
        $this->categoria_id = $foreignKey;
    }

    public function getForeignKey()
    {
        return $this->categoria_id;
    }

    public function delete() {
        $this->scenario = 'delete';
        $this->desativado = 0;
        return $this->save();
    }

	public function existeAlgumaSubCategoria(){
		if(is_null($this->categoria_id)) throw new CHttpException(400,'Categoria inexistente!');
		
		if(!SubCategoria::model()->exists(" categoria_id = {$this->categoria_id} ")){
			$this->addError("nome", Yii::t("sistema","Por favor, insira pelo menos uma Subcategoria!"));
		}
	}
}
