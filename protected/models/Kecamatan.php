<?php

/**
 * This is the model class for table "kecamatan".
 *
 * The followings are the available columns in table 'kecamatan':
 * @property integer $idkab
 * @property string $nama_kec
 * @property integer $idkec
 *
 * The followings are the available model relations:
 * @property AsalSekolah[] $asalSekolahs
 * @property Pendaftar[] $pendaftars
 * @property Wali[] $walis
 * @property Siswa[] $siswas
 * @property Kabupaten $idkab0
 * @property Guru[] $gurus
 */
class Kecamatan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kecamatan the static model class
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
		return 'kecamatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idkab, nama_kec, idkec', 'required'),
			array('idkab, idkec', 'numerical', 'integerOnly'=>true),
			array('nama_kec', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idkab, nama_kec, idkec', 'safe', 'on'=>'search'),
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
			'asalSekolahs' => array(self::HAS_MANY, 'AsalSekolah', 'idkec'),
			'pendaftars' => array(self::HAS_MANY, 'Pendaftar', 'idkec'),
			'walis' => array(self::HAS_MANY, 'Wali', 'idkec'),
			'siswas' => array(self::HAS_MANY, 'Siswa', 'idkec'),
			'idkab0' => array(self::BELONGS_TO, 'Kabupaten', 'idkab'),
			'gurus' => array(self::HAS_MANY, 'Guru', 'idkec'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idkab' => 'Idkab',
			'nama_kec' => 'Nama Kec',
			'idkec' => 'Idkec',
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
		$criteria->compare('nama_kec',$this->nama_kec,true);
		$criteria->compare('idkec',$this->idkec);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getCityOptionsByState($idkab) {
		if(empty($idkab))
			$idkab = null;
	
		$kecamatan = self::model()->findAll('idkab=:idkab order by nama_kec',array('idkab'=>$idkab));
	
		$kec = CHtml::listData($kecamatan, 'idkec', 'nama_kec');
		return $kec;
	}
}