<?php

/**
 * This is the model class for table "materia".
 *
 * The followings are the available columns in table 'materia':
 * @property integer $id_materia
 * @property string $nombre_materia
 * @property integer $carga_academica
 *
 * The followings are the available model relations:
 * @property MateriaProfesor[] $materiaProfesors
 */
class Materia extends CActiveRecord
{
	public $activo;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'materia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_materia, carga_academica', 'required'),
			array('carga_academica', 'numerical', 'integerOnly'=>true),
			array('nombre_materia', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_materia, nombre_materia, carga_academica, activo', 'safe', 'on'=>'search'),
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
			'materiaProfesors' => array(self::HAS_MANY, 'MateriaProfesor', 'fk_materia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_materia' => 'Id Materia',
			'nombre_materia' => 'Nombre Materia',
			'carga_academica' => 'Carga Academica',
			'activo' => 'La materia esta activa?',
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

		$criteria->compare('id_materia',$this->id_materia);
		$criteria->compare('nombre_materia',$this->nombre_materia,true);
		$criteria->compare('carga_academica',$this->carga_academica);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Materia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
