<?php

/**
 * This is the model class for table "nilai".
 *
 * The followings are the available columns in table 'nilai':
 * @property integer $nis
 * @property string $kode_mapel
 * @property string $th_ajar
 * @property string $semester
 * @property string $kode_guru
 * @property string $kurikulum
 * @property integer $na
 * @property integer $un
 * @property integer $uas
 * @property integer $kelas
 * @property string $lokal
 *
 * The followings are the available model relations:
 * @property Siswa $nis0
 * @property Guru $kodeGuru
 * @property PenempatanMapel $kodeMapel
 * @property PenempatanMapel $kurikulum0
 * @property PenempatanMapel $kelas0
 * @property PenempatanMapel $lokal0
 * @property SemesterAktif $thAjar
 * @property SemesterAktif $semester0
 */
class Nilai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nilai the static model class
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
		return 'nilai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nis, kode_mapel, th_ajar, semester, kode_guru, kurikulum, na, un, uas, kelas, lokal', 'required'),
			array('nis, na, un, uas, kelas', 'numerical', 'integerOnly'=>true),
			array('kode_mapel', 'length', 'max'=>6),
			array('th_ajar, kurikulum', 'length', 'max'=>10),
			array('semester, lokal', 'length', 'max'=>1),
			array('kode_guru', 'length', 'max'=>2),
			array('na', 'numerical', 'max'=>100, 'min'=>10, 'integerOnly'=>true, 'tooSmall'=>'Nilai minimal yaitu 10', 'tooBig'=>'Nilai maksimal adalah 100'),
			array('uas, un', 'numerical', 'max'=>100, 'min'=>0, 'integerOnly'=>true, 'tooSmall'=>'Nilai minimal yaitu 10', 'tooBig'=>'Nilai maksimal adalah 100'),
			array('na, uas, un', 'length', 'max'=>3),
			//array('nis', 'CompositeUniqueKeyValidator', 'keyColumns' => 'nis, kode_mapel, th_ajar, semester'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nis, kode_mapel, th_ajar, semester, kode_guru, kurikulum, na, un, uas, kelas, lokal', 'safe', 'on'=>'search'),
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
			'kodeGuru' => array(self::BELONGS_TO, 'Guru', 'kode_guru'),
			'kodeMapel' => array(self::BELONGS_TO, 'PenempatanMapel', 'kode_mapel'),
			'kurikulum0' => array(self::BELONGS_TO, 'PenempatanMapel', 'kurikulum'),
			'kelas0' => array(self::BELONGS_TO, 'PenempatanMapel', 'kelas'),
			'lokal0' => array(self::BELONGS_TO, 'PenempatanMapel', 'lokal'),
			'thAjar' => array(self::BELONGS_TO, 'SemesterAktif', 'th_ajar'),
			'semester0' => array(self::BELONGS_TO, 'SemesterAktif', 'semester'),
			'penempatans' => array(self::BELONGS_TO, 'Penempatan', 'nis'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nis' => 'NIS',
			'kode_mapel' => 'Kode Mapel',
			'th_ajar' => 'Tahun',
			'semester' => 'Semester',
			'kode_guru' => 'Kode Guru',
			'kurikulum' => 'Kurikulum',
			'na' => 'Nilai',
			'un' => 'Ujian Nasional',
			'uas' => 'Ujian Sekolah',
			'kelas' => 'Kelas',
			'lokal' => 'Lokal',
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

		$criteria->compare('nis',$this->nis);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('na',$this->na);
		$criteria->compare('un',$this->un);
		$criteria->compare('uas',$this->uas);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('lokal',$this->lokal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function groupsiswa()
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
			'condition' => "nis='".$_GET['id']."'",
			'order'=>'kode_mapel ASC'
		));
		
		$criteria->compare('nis',$this->nis);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('semester',$smt,true);
		$criteria->compare('th_ajar',$th_ajar,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('na',$this->na);
		$criteria->compare('un',$this->un);
		$criteria->compare('uas',$this->uas);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('lokal',$this->lokal,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function mapel()
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
				'order'=>'nis ASC',
				'condition'=>"kode_guru='".Yii::app()->user->id."'",
		));
		$criteria->compare('na',$this->na);
		$criteria->compare('un',$this->un);
		$criteria->compare('uas',$this->uas);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('lokal',$this->lokal,true);
		$koru=Yii::app()->db->createCommand("select kode_guru from nilai where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		$criteria->compare('kode_guru',$koru,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('semester',$smt,true);
		$criteria->compare('th_ajar',$th_ajar,true);
		
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
			'condition'=>"kode_guru='".Yii::app()->user->id."'",
			'select'=>'nis, kelas, lokal',
			'order'=>'nis ASC',
			'group'=>'nis, kelas, lokal',
		));
		
		$criteria->compare('na',$this->na);
		$criteria->compare('un',$this->un);
		$criteria->compare('uas',$this->uas);
		$criteria->compare('nis',$this->nis);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$kelas=Yii::app()->db->createCommand("select kelas from nilai where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		$criteria->compare('kelas',$kelas);
		$criteria->compare('lokal',$this->lokal,true);
		
		//$koru=Yii::app()->db->createCommand("select kode_guru from nilai where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		//$criteria->compare('kode_guru',$koru,true);
			
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('semester',$smt,true);
		$criteria->compare('th_ajar',$th_ajar,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	//Untuk Tabel nilai di index Gan!
	public function searchindex()
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
			'condition'=>"th_ajar='".$th_ajar."' and semester='".$smt."'",
			'order'=>'na DESC',
		));
		$criteria->compare('nis',$this->nis);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('na',$this->na);
		$criteria->compare('un',$this->un);
		$criteria->compare('uas',$this->uas);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('lokal',$this->lokal,true);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array('pageSize'=>6),
		));
	}
}