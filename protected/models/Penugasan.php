<?php

/**
 * This is the model class for table "penugasan".
 *
 * The followings are the available columns in table 'penugasan':
 * @property string $kode_guru
 * @property string $kode_mapel
 * @property string $kelas
 * @property string $lokal
 * @property string $th_ajar
 * @property string $semester
 * @property string $jumlah_jam
 *
 * The followings are the available model relations:
 * @property Jadwal[] $jadwals
 * @property Jadwal[] $jadwals1
 * @property Jadwal[] $jadwals2
 * @property Jadwal[] $jadwals3
 * @property Jadwal[] $jadwals4
 * @property Jadwal[] $jadwals5
 * @property Guru $kodeGuru
 * @property MataPelajaran $kodeMapel
 * @property SemesterAktif $thAjar
 * @property SemesterAktif $semester0
 */
class Penugasan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Penugasan the static model class
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
		return 'penugasan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_guru, kode_mapel, kelas, lokal, th_ajar, semester, jumlah_jam', 'required'),
			array('kode_guru, jumlah_jam', 'length', 'max'=>2),
			array('kode_mapel', 'length', 'max'=>6),
			array('kelas', 'length', 'max'=>5),
			array('lokal, semester', 'length', 'max'=>1),
			array('th_ajar', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_guru, kode_mapel, kelas, lokal, th_ajar, semester, jumlah_jam', 'safe', 'on'=>'search'),
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
			'jadwals' => array(self::HAS_MANY, 'Jadwal', 'kode_guru'),
			'jadwals1' => array(self::HAS_MANY, 'Jadwal', 'kode_mapel'),
			'jadwals2' => array(self::HAS_MANY, 'Jadwal', 'kelas'),
			'jadwals3' => array(self::HAS_MANY, 'Jadwal', 'lokal'),
			'jadwals4' => array(self::HAS_MANY, 'Jadwal', 'th_ajar'),
			'jadwals5' => array(self::HAS_MANY, 'Jadwal', 'semester'),
			'kodeGuru' => array(self::BELONGS_TO, 'Guru', 'kode_guru'),
			'kodeMapel' => array(self::BELONGS_TO, 'MataPelajaran', 'kode_mapel'),
			'thAjar' => array(self::BELONGS_TO, 'SemesterAktif', 'th_ajar'),
			'semester0' => array(self::BELONGS_TO, 'SemesterAktif', 'semester'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_guru' => 'Kode Guru',
			'kode_mapel' => 'Kode Mapel',
			'kelas' => 'Kelas',
			'lokal' => 'Lokal',
			'th_ajar' => 'Th Ajar',
			'semester' => 'Semester',
			'jumlah_jam' => 'Jumlah Jam',
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

		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kelas',$this->kelas,true);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('jumlah_jam',$this->jumlah_jam,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}