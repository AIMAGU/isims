<?php

/**
 * INI ADALAH CONTROLLER UNTUK MENGATUR PENEMPATAN KELAS
 * This is the model class for table "penempatan".
 *
 * The followings are the available columns in table 'penempatan':
 * @property integer $nis
 * @property integer $kelas
 * @property string $lokal
 * @property string $th_ajar
 * @property integer $id_penempatan_kls
 *
 * The followings are the available model relations:
 * @property Lokal $kelas0
 * @property Lokal $lokal0
 * @property Siswa $nis0
 * @property ThAjar $thAjar
 */
class Penempatan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Penempatan the static model class
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
		return 'penempatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nis, kelas, lokal, th_ajar', 'required'),
			array('nis, kelas', 'numerical', 'integerOnly'=>true),
			array('lokal', 'length', 'max'=>1),
			array('th_ajar', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nis, kelas, lokal, th_ajar, id_penempatan_kls', 'safe', 'on'=>'search'),
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
			'kelas0' => array(self::BELONGS_TO, 'Lokal', 'kelas'),
			'lokal0' => array(self::BELONGS_TO, 'Lokal', 'lokal'),
			'nis0' => array(self::BELONGS_TO, 'Siswa', 'nis'),
			'thAjar' => array(self::BELONGS_TO, 'ThAjar', 'th_ajar'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'nis'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nis' => 'Nis',
			'kelas' => 'Kelas',
			'lokal' => 'Lokal',
			'th_ajar' => 'Th Ajar',
			'id_penempatan_kls' => 'Id Penempatan Kls',
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

		$criteria = new CDbCriteria(array(
			//'condition' => "nis='".$_GET['id']."'",
			'order'=>'kelas, lokal ASC'
		));

		$criteria->compare('nis',$this->nis);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('id_penempatan_kls',$this->id_penempatan_kls);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>34),
		));
	}
	
	public function search2()
	{
		// Untuk pengelompokan siswa di kotak dialog
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}else if($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
			'condition' => "th_ajar='".$th_ajar."'",
		));
	
		$criteria->compare('nis',$this->nis);
		$kelas=Yii::app()->db->createCommand("select kelas from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		$lokal=Yii::app()->db->createCommand("select lokal from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		//$th_ajar=Yii::app()->db->createCommand("select th_ajar from penempatan where th_ajar='".(date('Y')-1).'/'.date('Y')."';")->queryScalar();
		$criteria->compare('kelas',$kelas);
		$criteria->compare('lokal',$lokal,true);
		$criteria->compare('th_ajar',$th_ajar,true);
		$criteria->compare('id_penempatan_kls',$this->id_penempatan_kls);
	
		/*
		 $kelas=Yii::app()->db->createCommand("select kelas from jadwal where kode_guru='".Yii::app()->user->id."';")->queryAll();
		$lokal=Yii::app()->db->createCommand("select lokal from jadwal where kode_guru='".Yii::app()->user->id."';")->queryAll();
		foreach ($kelas as $kelasku){
		$criteria->compare('kelas',$kelasku);
		}
		foreach ($lokal as $lokalku){
		$criteria->compare('lokal',$lokalku,true);
		}
		*/
		
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	//Untuk presensi dengan aktor guru piket
	public function gurupiket()
	{
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}else if($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
				'condition' => "th_ajar='".$th_ajar."'",
		));
	
		$criteria->compare('nis',$this->nis);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('th_ajar',$th_ajar,true);
		$criteria->compare('id_penempatan_kls',$this->id_penempatan_kls);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function penempatanwali()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}else if($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
			'condition' => "th_ajar='".$th_ajar."'",
		));
	
		$criteria->compare('nis',$this->nis);
		$kelas=Yii::app()->db->createCommand("select kelas from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		$lokal=Yii::app()->db->createCommand("select lokal from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		$criteria->compare('kelas',$kelas);
		$criteria->compare('lokal',$lokal,true);
		$criteria->compare('th_ajar',$th_ajar,true);
		$criteria->compare('id_penempatan_kls',$this->id_penempatan_kls);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array('pageSize'=>34),
		));
	}
	
	//Penempatan kelas setelah di naikan oleh wali kelas (Untuk kurikulum)
	public function kelas1()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}else if($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
				'condition' => "th_ajar='".$th_ajar."' and kelas=1",
				//'order' => 'nis ASC'
		));
		
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array('pageSize'=>120),
		));
	}
	
	//Penempatan kelas setelah di naikan oleh wali kelas (Untuk kurikulum)
	public function kelas2()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}else if($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
				'condition' => "th_ajar='".$th_ajar."' and kelas=2",
		));
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array('pageSize'=>120),
		));
	}
	
	//Penempatan kelas setelah di naikan oleh wali kelas (Untuk kurikulum)
	public function kelas3()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}else if($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
				'condition' => "th_ajar='".$th_ajar."' and kelas=3",
		));
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array('pageSize'=>120),
		));
	}
	
	//Penempatan kelas setelah di naikan oleh wali kelas (Untuk kurikulum)
	public function kelas4()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}else if($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
				'condition' => "th_ajar='".$th_ajar."' and kelas=4",
		));
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array('pageSize'=>120),
		));
	}
	
	//Penempatan kelas setelah di naikan oleh wali kelas (Untuk kurikulum)
	public function kelas5()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}else if($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
				'condition' => "th_ajar='".$th_ajar."' and kelas=5",
		));
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array('pageSize'=>120),
		));
	}
	
	//Penempatan kelas setelah di naikan oleh wali kelas (Untuk kurikulum)
	public function kelas6()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$bulan=date('m');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}else if($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		$criteria = new CDbCriteria(array(
				'condition' => "th_ajar='".$th_ajar."' and kelas=6",
		));
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array('pageSize'=>120),
		));
	}
}