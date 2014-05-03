<?php

/**
 * This is the model class for table "periodo_evento".
 *
 * The followings are the available columns in table 'periodo_evento':
 * @property integer $id
 * @property string $data_inicial
 * @property string $data_final
 * @property string $email
 * @property integer $evento_id
 * @property integer $pesquisa_id
 *
 * The followings are the available model relations:
 * @property Evento $evento
 * @property Pesquisa $pesquisa
 */
class PeriodoEvento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'periodo_evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('evento_id, pesquisa_id', 'numerical', 'integerOnly'=>true),
			array('data_inicial, data_final, email', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, data_inicial, data_final, email, evento_id, pesquisa_id', 'safe', 'on'=>'search'),
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
			'evento' => array(self::BELONGS_TO, 'Evento', 'evento_id'),
			'pesquisa' => array(self::BELONGS_TO, 'Pesquisa', 'pesquisa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'data_inicial' => 'Data Inicial',
			'data_final' => 'Data Final',
			'email' => 'Email',
			'evento_id' => 'Evento',
			'pesquisa_id' => 'Pesquisa',
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
		$criteria->compare('data_inicial',$this->data_inicial,true);
		$criteria->compare('data_final',$this->data_final,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('evento_id',$this->evento_id);
		$criteria->compare('pesquisa_id',$this->pesquisa_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PeriodoEvento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
