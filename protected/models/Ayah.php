<?php

/**
 * This is the model class for table "ayah".
 *
 * The followings are the available columns in table 'ayah':
 * @property integer $nik_ayah
 * @property string $nama_ayah
 * @property string $agama_ayah
 * @property string $tempat_lahir_ayah
 * @property string $tanggal_lahir_ayah
 * @property string $pend_ayah
 * @property string $pekerjaan_ayah
 * @property string $telp_ayah
 * @property integer $penghasilan_ayah
 *
 * The followings are the available model relations:
 * @property Keluarga[] $keluargas
 */
class Ayah extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ayah the static model class
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
		return 'ayah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nik_ayah, nama_ayah, agama_ayah, tempat_lahir_ayah, tanggal_lahir_ayah, pend_ayah, penghasilan_ayah', 'required'),
			array('nik_ayah, penghasilan_ayah', 'numerical', 'integerOnly'=>true),
			array('nama_ayah', 'length', 'max'=>50),
			array('agama_ayah', 'length', 'max'=>10),
			array('tempat_lahir_ayah, pend_ayah, pekerjaan_ayah', 'length', 'max'=>30),
			array('telp_ayah', 'length', 'max'=>13),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nik_ayah, nama_ayah, agama_ayah, tempat_lahir_ayah, tanggal_lahir_ayah, pend_ayah, pekerjaan_ayah, telp_ayah, penghasilan_ayah', 'safe', 'on'=>'search'),
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
			'keluargas' => array(self::HAS_MANY, 'Keluarga', 'nik_ayah'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nik_ayah' => 'Nik Ayah',
			'nama_ayah' => 'Nama Ayah',
			'agama_ayah' => 'Agama Ayah',
			'tempat_lahir_ayah' => 'Tempat Lahir Ayah',
			'tanggal_lahir_ayah' => 'Tanggal Lahir Ayah',
			'pend_ayah' => 'Pend Ayah',
			'pekerjaan_ayah' => 'Pekerjaan Ayah',
			'telp_ayah' => 'Telp Ayah',
			'penghasilan_ayah' => 'Penghasilan Ayah',
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

		$criteria->compare('nik_ayah',$this->nik_ayah);
		$criteria->compare('nama_ayah',$this->nama_ayah,true);
		$criteria->compare('agama_ayah',$this->agama_ayah,true);
		$criteria->compare('tempat_lahir_ayah',$this->tempat_lahir_ayah,true);
		$criteria->compare('tanggal_lahir_ayah',$this->tanggal_lahir_ayah,true);
		$criteria->compare('pend_ayah',$this->pend_ayah,true);
		$criteria->compare('pekerjaan_ayah',$this->pekerjaan_ayah,true);
		$criteria->compare('telp_ayah',$this->telp_ayah,true);
		$criteria->compare('penghasilan_ayah',$this->penghasilan_ayah);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}