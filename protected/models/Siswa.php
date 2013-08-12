<?php

/**
 * This is the model class for table "siswa".
 *
 * The followings are the available columns in table 'siswa':
 * @property integer $nis
 * @property string $nama_lengkap
 * @property string $nama_panggilan
 * @property string $jk
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property integer $anak_ke
 * @property string $status
 * @property integer $jml_saudara
 * @property string $alamat
 * @property string $no_telp
 * @property string $agama
 * @property string $kewarganegaraan
 * @property string $bahasa
 * @property integer $jarak_rumah
 * @property string $foto
 * @property string $th_ajar
 * @property string $semester
 * @property integer $idkec
 * @property integer $id_sekolah
 * @property integer $nik_wali
 * @property integer $no_kk
 * @property integer $no_pendaftaran
 * @property integer $nisn
 *
 * The followings are the available model relations:
 * @property Pendaftar $noPendaftaran
 * @property Kecamatan $idkec0
 * @property AsalSekolah $idSekolah
 * @property Keluarga $noKk
 * @property Wali $nikWali
 * @property SemesterAktif $thAjar
 * @property SemesterAktif $semester0
 * @property NonAkademik[] $nonAkademiks
 * @property Presensi[] $presensis
 * @property TransaksiReal[] $transaksiReals
 * @property Nilai[] $nilais
 * @property PenempatanKelas[] $penempatanKelases
 */
class Siswa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Siswa the static model class
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
		return 'siswa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nis, nama_lengkap, jk, tempat_lahir, tanggal_lahir, anak_ke, status, jml_saudara, alamat, agama, kewarganegaraan, foto, th_ajar, semester, idkec, id_sekolah, no_kk, no_pendaftaran', 'required'),
			array('nis, anak_ke, jml_saudara, jarak_rumah, idkec, id_sekolah, nik_wali, no_kk, no_pendaftaran, nisn', 'numerical', 'integerOnly'=>true),
			array('nama_lengkap, alamat', 'length', 'max'=>50),
			array('nama_panggilan, bahasa', 'length', 'max'=>20),
			array('jk, semester', 'length', 'max'=>1),
			array('tempat_lahir', 'length', 'max'=>30),
			array('status', 'length', 'max'=>15),
			array('no_telp', 'length', 'max'=>13),
			array('agama, th_ajar', 'length', 'max'=>10),
			array('kewarganegaraan', 'length', 'max'=>3),
			array('foto','file', 'types'=>'gif, png, jpg, jpeg'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nis, nama_lengkap, nama_panggilan, jk, tempat_lahir, tanggal_lahir, anak_ke, status, jml_saudara, alamat, no_telp, agama, kewarganegaraan, bahasa, jarak_rumah, foto, th_ajar, semester, idkec, id_sekolah, nik_wali, no_kk, no_pendaftaran, nisn', 'safe', 'on'=>'search'),
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
			'noPendaftaran' => array(self::BELONGS_TO, 'Pendaftar', 'no_pendaftaran'),
			'idkec0' => array(self::BELONGS_TO, 'Kecamatan', 'idkec'),
			'idSekolah' => array(self::BELONGS_TO, 'AsalSekolah', 'id_sekolah'),
			'noKk' => array(self::BELONGS_TO, 'Keluarga', 'no_kk'),
			'nikWali' => array(self::BELONGS_TO, 'Wali', 'nik_wali'),
			'thAjar' => array(self::BELONGS_TO, 'SemesterAktif', 'th_ajar'),
			'semester0' => array(self::BELONGS_TO, 'SemesterAktif', 'semester'),
			'nonAkademiks' => array(self::HAS_MANY, 'NonAkademik', 'nis'),
			'presensis' => array(self::HAS_MANY, 'Presensi', 'nis'),
			'transaksiReals' => array(self::HAS_MANY, 'TransaksiReal', 'nis'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'nis'),
			'penempatans' => array(self::HAS_MANY, 'Penempatan', 'nis'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nis' => 'NIS',
			'nama_lengkap' => 'Nama Lengkap',
			'nama_panggilan' => 'Nama Panggilan',
			'jk' => 'Jenis Kelamin',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'anak_ke' => 'Anak Ke',
			'status' => 'Status',
			'jml_saudara' => 'Jumlah Saudara',
			'alamat' => 'Alamat',
			'no_telp' => 'Telp',
			'agama' => 'Agama',
			'kewarganegaraan' => 'Kewarganegaraan',
			'bahasa' => 'Bahasa',
			'jarak_rumah' => 'Jarak Rumah',
			'foto' => 'Foto',
			'th_ajar' => 'Tahun Ajar',
			'semester' => 'Semester',
			'idkec' => 'Kecamatan',
			'id_sekolah' => 'Sekolah Asal',
			'nik_wali' => 'NIK Wali',
			'no_kk' => 'NO KK',
			'no_pendaftaran' => 'NO Pendaftaran',
			'nisn' => 'NISN',
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
		$criteria->compare('nama_lengkap',$this->nama_lengkap,true);
		$criteria->compare('nama_panggilan',$this->nama_panggilan,true);
		$criteria->compare('jk',$this->jk,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('anak_ke',$this->anak_ke);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('jml_saudara',$this->jml_saudara);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('agama',$this->agama,true);
		$criteria->compare('kewarganegaraan',$this->kewarganegaraan,true);
		$criteria->compare('bahasa',$this->bahasa,true);
		$criteria->compare('jarak_rumah',$this->jarak_rumah);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('th_ajar',$this->th_ajar,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('idkec',$this->idkec);
		$criteria->compare('id_sekolah',$this->id_sekolah);
		$criteria->compare('nik_wali',$this->nik_wali);
		$criteria->compare('no_kk',$this->no_kk);
		$criteria->compare('no_pendaftaran',$this->no_pendaftaran);
		$criteria->compare('nisn',$this->nisn);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}