<?php

/**
 * This is the model class for table "semester_aktif".
 *
 * The followings are the available columns in table 'semester_aktif':
 * @property string $th_ajar
 * @property string $semester
 *
 * The followings are the available model relations:
 * @property Presensi[] $presensis
 * @property Presensi[] $presensis1
 * @property NonAkademik[] $nonAkademiks
 * @property NonAkademik[] $nonAkademiks1
 * @property Siswa[] $siswas
 * @property Siswa[] $siswas1
 * @property ThAjar $thAjar
 */
class SemesterAktif extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SemesterAktif the static model class
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
		return 'semester_aktif';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('th_ajar, semester, bulanawal, bulanakhir', 'required'),
			array('th_ajar', 'length', 'max'=>10),
			array('semester', 'length', 'max'=>1),
			array('bulanawal', 'length', 'max'=>8),
			array('bulanakhir', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('th_ajar, semester, bulanawal, bulanakhir', 'safe', 'on'=>'search'),
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
			'presensis' => array(self::HAS_MANY, 'Presensi', 'th_ajar'),
			'presensis1' => array(self::HAS_MANY, 'Presensi', 'semester'),
			'nonAkademiks' => array(self::HAS_MANY, 'NonAkademik', 'th_ajar'),
			'nonAkademiks1' => array(self::HAS_MANY, 'NonAkademik', 'semester'),
			'siswas' => array(self::HAS_MANY, 'Siswa', 'th_ajar'),
			'siswas1' => array(self::HAS_MANY, 'Siswa', 'semester'),
			'thAjar' => array(self::BELONGS_TO, 'ThAjar', 'th_ajar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'th_ajar' => 'Th Ajar',
			'semester' => 'Semester',
			'bulanawal' => 'Bulan Awal',
			'bulanakhir' => 'Bulan Akhir',
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

		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('bulanawal',$this->bulanawal,true);
		$criteria->compare('bulanakhir',$this->bulanakhir,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}