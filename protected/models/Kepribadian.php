<?php

/**
 * This is the model class for table "kepribadian".
 *
 * The followings are the available columns in table 'kepribadian':
 * @property integer $id_pribadi
 * @property string $nama_pribadi
 *
 * The followings are the available model relations:
 * @property TrPribadi[] $trPribadis
 */
class Kepribadian extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kepribadian the static model class
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
		return 'kepribadian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_pribadi', 'required'),
			array('nama_pribadi', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pribadi, nama_pribadi', 'safe', 'on'=>'search'),
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
			'trPribadis' => array(self::HAS_MANY, 'TrPribadi', 'id_pribadi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pribadi' => 'Id Pribadi',
			'nama_pribadi' => 'Nama Pribadi',
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

		$criteria->compare('id_pribadi',$this->id_pribadi);
		$criteria->compare('nama_pribadi',$this->nama_pribadi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}