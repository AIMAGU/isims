<?php

/**
 * This is the model class for table "ruangan".
 *
 * The followings are the available columns in table 'ruangan':
 * @property string $idruang
 * @property string $nama_ruang
 * @property integer $kapasitas
 * @property integer $luas
 *
 * The followings are the available model relations:
 * @property Waktu[] $waktus
 */
class Ruangan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ruangan the static model class
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
		return 'ruangan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idruang, nama_ruang, kapasitas, luas', 'required'),
			array('kapasitas, luas', 'numerical', 'integerOnly'=>true),
			array('kode_ruang', 'length', 'max'=>20),
			array('nama_ruang', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idruang, nama_ruang, kapasitas, luas', 'safe', 'on'=>'search'),
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
			'waktus' => array(self::MANY_MANY, 'Waktu', 'jadwal(idruang, idwaktu)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idruang' => 'Kode Ruang',
			'nama_ruang' => 'Nama Ruang',
			'kapasitas' => 'Kapasitas',
			'luas' => 'Luas',
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

		$criteria->compare('idruang',$this->idruang,true);
		$criteria->compare('nama_ruang',$this->nama_ruang,true);
		$criteria->compare('kapasitas',$this->kapasitas);
		$criteria->compare('luas',$this->luas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}