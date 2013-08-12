<?php

/**
 * This is the model class for table "wali".
 *
 * The followings are the available columns in table 'wali':
 * @property integer $nik_wali
 * @property string $nama_wali
 * @property string $alamat
 * @property string $hub_keluarga
 * @property string $pend_terakhir
 * @property string $pekerjaan
 * @property integer $penghasilan
 * @property integer $idkec
 *
 * The followings are the available model relations:
 * @property Pendaftar[] $pendaftars
 * @property Kecamatan $idkec0
 * @property Siswa[] $siswas
 */
class Wali extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Wali the static model class
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
		return 'wali';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_wali, alamat, hub_keluarga, pend_terakhir, pekerjaan, penghasilan, idkec', 'required'),
			array('penghasilan, idkec', 'numerical', 'integerOnly'=>true),
			array('nama_wali, hub_keluarga, pekerjaan', 'length', 'max'=>30),
			array('alamat', 'length', 'max'=>50),
			array('pend_terakhir', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nik_wali, nama_wali, alamat, hub_keluarga, pend_terakhir, pekerjaan, penghasilan, idkec', 'safe', 'on'=>'search'),
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
			'pendaftars' => array(self::HAS_MANY, 'Pendaftar', 'nik_wali'),
			'idkec0' => array(self::BELONGS_TO, 'Kecamatan', 'idkec'),
			'siswas' => array(self::HAS_MANY, 'Siswa', 'nik_wali'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nik_wali' => 'Nik Wali',
			'nama_wali' => 'Nama Wali',
			'alamat' => 'Alamat',
			'hub_keluarga' => 'Hub Keluarga',
			'pend_terakhir' => 'Pend Terakhir',
			'pekerjaan' => 'Pekerjaan',
			'penghasilan' => 'Penghasilan',
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

		$criteria->compare('nik_wali',$this->nik_wali);
		$criteria->compare('nama_wali',$this->nama_wali,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('hub_keluarga',$this->hub_keluarga,true);
		$criteria->compare('pend_terakhir',$this->pend_terakhir,true);
		$criteria->compare('pekerjaan',$this->pekerjaan,true);
		$criteria->compare('penghasilan',$this->penghasilan);
		$criteria->compare('idkec',$this->idkec);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}