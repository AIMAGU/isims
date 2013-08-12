<?php

/**
 * This is the model class for table "jurnal".
 *
 * The followings are the available columns in table 'jurnal':
 * @property string $idruang
 * @property string $kode_guru
 * @property string $kode_mapel
 * @property string $kurikulum
 * @property integer $kelas
 * @property string $th_ajar
 * @property string $semester
 * @property string $idwaktu
 * @property string $lokal
 * @property string $tanggal
 * @property string $materi
 * @property string $metode_mengajar
 * @property string $keterangan
 * @property integer $pertemuan
 */
class Jurnal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Jurnal the static model class
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
		return 'jurnal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idruang, kode_guru, kode_mapel, kurikulum, kelas, th_ajar, semester, idwaktu, lokal, tanggal, materi, metode_mengajar', 'required'),
			array('kelas, pertemuan', 'numerical', 'integerOnly'=>true),
			array('idruang', 'length', 'max'=>20),
			array('kode_guru', 'length', 'max'=>2),
			array('kode_mapel, idwaktu', 'length', 'max'=>6),
			array('kurikulum, th_ajar', 'length', 'max'=>10),
			array('semester, lokal', 'length', 'max'=>1),
			array('materi, metode_mengajar', 'length', 'max'=>50),
			array('keterangan', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idruang, kode_guru, kode_mapel, kurikulum, kelas, th_ajar, semester, idwaktu, lokal, tanggal, materi, metode_mengajar, keterangan, pertemuan', 'safe', 'on'=>'search'),
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
			'idruang0' => array(self::BELONGS_TO, 'Ruangan', 'idruang'),
			'thAjar' => array(self::BELONGS_TO, 'SemesterAktif', 'th_ajar'),
			'semester0' => array(self::BELONGS_TO, 'SemesterAktif', 'semester'),
			'idwaktu0' => array(self::BELONGS_TO, 'Waktu', 'idwaktu'),
			'kodeMapel' => array(self::BELONGS_TO, 'PenempatanMapel', 'kode_mapel'),
			'kelas0' => array(self::BELONGS_TO, 'PenempatanMapel', 'kelas'),
			'lokal0' => array(self::BELONGS_TO, 'PenempatanMapel', 'lokal'),
			'kurikulum0' => array(self::BELONGS_TO, 'PenempatanMapel', 'kurikulum'),
			'kodeGuru' => array(self::BELONGS_TO, 'Guru', 'kode_guru'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idruang' => 'Idruang',
			'kode_guru' => 'Kode Guru',
			'kode_mapel' => 'Kode Mapel',
			'kurikulum' => 'Kurikulum',
			'kelas' => 'Kelas',
			'th_ajar' => 'Th Ajar',
			'semester' => 'Semester',
			'idwaktu' => 'Idwaktu',
			'lokal' => 'Lokal',
			'tanggal' => 'Tanggal',
			'materi' => 'Materi',
			'metode_mengajar' => 'Metode Mengajar',
			'keterangan' => 'Keterangan',
			'pertemuan' => 'Pertemuan',
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
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('idwaktu',$this->idwaktu,true);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('materi',$this->materi,true);
		$criteria->compare('metode_mengajar',$this->metode_mengajar,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('pertemuan',$this->pertemuan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function thisjurnal()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$criteria = new CDbCriteria(array(
			'condition' => "tanggal='".date('Y-m-d')."'",
		));
	
		$criteria->compare('idruang',$this->idruang,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('idwaktu',$this->idwaktu,true);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('materi',$this->materi,true);
		$criteria->compare('metode_mengajar',$this->metode_mengajar,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('pertemuan',$this->pertemuan);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jurnalall()
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
		
		$criteria->compare('idruang',$this->idruang,true);
		$criteria->compare('kode_guru',$this->kode_guru,true);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('idwaktu',$this->idwaktu,true);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('materi',$this->materi,true);
		$criteria->compare('metode_mengajar',$this->metode_mengajar,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('pertemuan',$this->pertemuan);
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	
	public function jurnal1()
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
		));
		$criteria->compare('semester',$smt,true);
		$criteria->compare('th_ajar',$th_ajar,true);
		$koru=Yii::app()->db->createCommand("select kode_guru from nilai where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		$criteria->compare('kode_guru',$koru,true);
		
		/*$criteria->compare('idruang',$this->idruang,true);
		$criteria->compare('kode_mapel',$this->kode_mapel,true);
		$criteria->compare('kurikulum',$this->kurikulum,true);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('idwaktu',$this->idwaktu,true);
		$criteria->compare('lokal',$this->lokal,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('materi',$this->materi,true);
		$criteria->compare('metode_mengajar',$this->metode_mengajar,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('pertemuan',$this->pertemuan);*/
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}