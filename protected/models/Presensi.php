<?php

/**
 * This is the model class for table "presensi".
 *
 * The followings are the available columns in table 'presensi':
 * @property string $status
 * @property string $tanggal
 * @property integer $nis
 * @property string $th_ajar
 * @property string $semester
 *
 * The followings are the available model relations:
 * @property Siswa $nis0
 * @property SemesterAktif $thAjar
 * @property SemesterAktif $semester0
 */
class Presensi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Presensi the static model class
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
		return 'presensi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, tanggal, nis, th_ajar, semester', 'required'),
			array('nis', 'numerical', 'integerOnly'=>true),
			array('status, semester', 'length', 'max'=>1),
			array('th_ajar', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, tanggal, nis, th_ajar, semester', 'safe', 'on'=>'search'),
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
			'nis0' => array(self::BELONGS_TO, 'Siswa', 'nis'),
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
			'status' => 'Status',
			'tanggal' => 'Tanggal',
			'nis' => 'Nis',
			'th_ajar' => 'Th Ajar',
			'semester' => 'Semester',
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

		$criteria->compare('status',$this->status,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function raport()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}elseif($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		
		$criteria = new CDbCriteria(array(
				'condition' => "nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."'",
		));
	
		$criteria->compare('status',$this->status,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function this_presensi()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	
		$criteria = new CDbCriteria(array(
			'condition' => "tanggal='".date('Y-m-d')."'",
		));
	
		$criteria->compare('status',$this->status,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function all_presensi()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}elseif($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		
		$criteria=new CDbCriteria;
		$criteria->compare('semester',$smt,true);
		$criteria->compare('th_ajar',$th_ajar,true);
	
		$criteria->compare('status',$this->status,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('nis',$this->nis);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}