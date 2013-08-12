<?php

/**
 * This is the model class for table "ekstra".
 *
 * The followings are the available columns in table 'ekstra':
 * @property integer $id_ekstra
 * @property string $nama_ekstra
 *
 * The followings are the available model relations:
 * @property TrEkstra[] $trEkstras
 */
class Ekstra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ekstra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ekstra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_ekstra', 'required'),
			array('nama_ekstra', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_ekstra, nama_ekstra', 'safe', 'on'=>'search'),
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
			'trEkstras' => array(self::HAS_MANY, 'TrEkstra', 'id_ekstra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ekstra' => 'Id Ekstra',
			'nama_ekstra' => 'Nama Ekstra',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_ekstra',$this->id_ekstra);
		$criteria->compare('nama_ekstra',$this->nama_ekstra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}