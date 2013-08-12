<?php

/**
 * This is the model class for table "asal_sekolah".
 *
 * The followings are the available columns in table 'asal_sekolah':
 * @property integer $id_sekolah
 * @property string $nama_sekolah
 * @property string $alamat
 * @property integer $idkec
 *
 * The followings are the available model relations:
 * @property Kecamatan $idkec0
 * @property Pendaftar[] $pendaftars
 * @property Siswa[] $siswas
 */
class AsalSekolah extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AsalSekolah the static model class
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
		return 'asal_sekolah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_sekolah, nama_sekolah, alamat, idkec', 'required'),
			array('id_sekolah, idkec', 'numerical', 'integerOnly'=>true),
			array('nama_sekolah, alamat', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_sekolah, nama_sekolah, alamat, idkec', 'safe', 'on'=>'search'),
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
			'idkec0' => array(self::BELONGS_TO, 'Kecamatan', 'idkec'),
			'pendaftars' => array(self::HAS_MANY, 'Pendaftar', 'id_sekolah'),
			'siswas' => array(self::HAS_MANY, 'Siswa', 'id_sekolah'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sekolah' => 'Id Sekolah',
			'nama_sekolah' => 'Nama Sekolah',
			'alamat' => 'Alamat',
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

		$criteria->compare('id_sekolah',$this->id_sekolah);
		$criteria->compare('nama_sekolah',$this->nama_sekolah,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('idkec',$this->idkec);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}