<?php

/**
 * This is the model class for table "kabupaten".
 *
 * The followings are the available columns in table 'kabupaten':
 * @property integer $idkab
 * @property string $nama_kab
 * @property integer $idprop
 *
 * The followings are the available model relations:
 * @property Propinsi $idprop0
 * @property Kecamatan[] $kecamatans
 */
class Kabupaten extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kabupaten the static model class
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
		return 'kabupaten';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idkab, nama_kab, idprop', 'required'),
			array('idkab, idprop', 'numerical', 'integerOnly'=>true),
			array('nama_kab', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idkab, nama_kab, idprop', 'safe', 'on'=>'search'),
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
			'idprop0' => array(self::BELONGS_TO, 'Propinsi', 'idprop'),
			'kecamatans' => array(self::HAS_MANY, 'Kecamatan', 'idkab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idkab' => 'Idkab',
			'nama_kab' => 'Nama Kab',
			'idprop' => 'Idprop',
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

		$criteria->compare('idkab',$this->idkab);
		$criteria->compare('nama_kab',$this->nama_kab,true);
		$criteria->compare('idprop',$this->idprop);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getStateOptions($idprop) {
		
		if(empty($idprop))
			$idprop = null;
	
		$kabupaten = self::model()->findAll('idprop=:idprop order by nama_kab',array('idprop'=>$idprop));
	
		$kab = CHtml::listData($kabupaten, 'idkab', 'nama_kab');
		return $kab;
	}
}