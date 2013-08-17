ISIMS - SUB SISTEM PENILAIAN
=====
ISIMS (Sistem Informasi Manajemen Sekolah Dasar) 
merupakan perangkat lunak untuk mengelola
nilai siswa, absensi siswa, jurnal mengajar, 
kenaikan kelas dan monitoring pembelajaran. 
Perangkat lunak ini bersifat open source dan 
di bangun menggunakan YII Framework.

FEATURES
- Manajemen Monitoring Pembelajaran 
- Pengaturan Website Dinamis 
- Manajemen Nilai dan Raport 
- Manajemen Jurnal Mengajar 
- Manajemen Kenaikan Kelas 
- Manajemen Absensi Siswa 
- Manajemen User 
- Kalkulator

REQUIREMENTS
- Yii 1.13 or above
- PHP 5.3 or above
- PostGreSQL 8.1 or above

INSTALLATION
- Download master yii framework (http://www.yiiframework.com/download/)
- Ekstrak file master yii framework ke dalam webserver (Ex: localhost/yii/master/)
- Ekstrak file isims dalam cd ke webserver (Ex: localhost/yii/isims/)
- Buka File index pada main direktori isims
   * Ubah baris ke-4 menjadi $yii=dirname(__FILE__).'/../master/framework/yii.php';
- Import database /isims/protected/data/isims-db.sql (PostGreSQL 8.1 or above)
- Buka konfigurasi .../isims/protected/config/main.php
   * Ubah baris 111-121 sesuai kebutuhan
   * 'db'=>array(
		'connectionString' => 'pgsql:host=localhost;port=5432;dbname=NAMA_DATABASE',
		'emulatePrepare' => true,
		'username' => 'USERNAME',
		'password' => 'PASSWORD',
		'charset' => 'utf8',
		'enableProfiling'=>true,
		'enableParamLogging' => true,
		'schemaCachingDuration' => 180,
	 ),
- Buka Browser --> localhost/yii/isims/ atau www/yii/isims/
- Website siap digunakan

USER MANAJEMEN
* Admin (Username: ocim | Password: ocim)

TRY OUT DEMO
* http://aimagu.blogspot.com

_____________________________________________________________________________________

ISIMS CMS OPEN SOURCE (BSD License)
Email: nurrochim@civitas.uns.ac.id
