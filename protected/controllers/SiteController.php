<?php

class SiteController extends Controller
{
	//public $layout='//layouts/column3';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	/**
	 * Displays the pengaturan page
	 */
	public function actionPengaturan()
	{
		if(Yii::app()->user->checkAccess('Kurikulum')){
			$model=new Pengaturan;
			if(isset($_POST['Pengaturan']))
			{
				$model->attributes=$_POST['Pengaturan'];
				if($model->validate()){
					//Upload Logo Mulai
					$savefilee;
					$savefavicon;
					if((strlen(trim(CUploadedFile::getInstance($model,'filee'))) > 0) || (strlen(trim(CUploadedFile::getInstance($model,'favicon'))) > 0) )
					{
						$savefilee=CUploadedFile::getInstance($model,'filee');
						$savefavicon=CUploadedFile::getInstance($model,'favicon');
						try {
							if($savefilee!=''){
									$model->filee='logo.'.$savefilee->extensionName;
									$savefilee->saveAs(Yii::app()->basePath . '/../images/' . $model->filee);
									Yii::app()->user->setFlash('success', 'Logo <strong>berhasil</strong> disimpan.');
									$this->redirect(array('site/pengaturan'));
								}
								elseif($savefavicon!=''){
									$model->favicon='fav.'.$savefavicon->extensionName;
									$savefavicon->saveAs(Yii::app()->basePath . '/../css/' . $model->favicon);
									Yii::app()->user->setFlash('success', 'Favicon <strong>berhasil</strong> disimpan.');
									$this->redirect(array('site/pengaturan'));
								}
								else{
									Yii::app()->user->setFlash('warning', 'Maaf, type file harus png dan berukuran maksimal 100 kb.');
								}
						}
						catch(CDbException $e) {
							Yii::app()->user->setFlash('warning', 'Maaf, type file harus png dan berukuran maksimal 100 kb.');
							$model->addError(null, "Maaf, type file harus png dan berukuran maksimal 100 kb."/*$e->getMessage()*/);
						}
					}
					//Upload logo Selesai
					
					//Write Params Mulai
					$isi="<?php
					return array(
						'title'=>'".$model->title."',
						'subtitle'=>'".$model->subtitle."',
						'adminEmail'=>'".$model->email."',
						'footer'=>'".$model->footer."',
					);
					?>";
						
					$file=dirname(__FILE__).'/../config/params.php';
					Yii::app()->user->setFlash('success', $file);
					if (file_exists($file)) {
						$datafile = fopen($file,"w");
						fwrite($datafile, $isi);
						fclose($datafile);
						Yii::app()->user->setFlash('success', 'Pengaturan <strong>berhasil</strong> disimpan.');
						$this->refresh();
					} else {
						Yii::app()->user->setFlash('error', 'File tidak ada');
					}
					//Write Params Selesai
				}
			}

			$this->render('pengaturan',array(
					'model'=>$model
			));
		}else{
			echo Yii::app()->user->setFlash('danger', 'Maaf, <strong>anda tidak memiliki</strong> hak akses pada laman ini!');
			$this->redirect(Yii::app()->homeUrl);
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//$this->layout='//layouts/mainFixed';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model=new Nilai('search');
		$model->unsetAttributes();  // clear any default values
		
		$this->render('index',array(
				'model'=>$model
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout='//layouts/column1';

		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Terima kasih atas pesan anda. Kami akan membalas pesan anda dalam beberapa waktu.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				Yii::app()->user->setFlash('success', 'Anda <strong>berhasil</strong> masuk. Selamat datang '.Yii::app()->user->name.'!');
				$this->redirect(Yii::app()->homeUrl);
				//$this->redirect(Yii::app()->user->returnUrl);
			}else{
				Yii::app()->user->setFlash('error', 'Anda <strong>gagal</strong> masuk.');
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		if (Yii::app()->user->logout()){
			Yii::app()->user->setFlash('success', 'Anda <strong>berhasil</strong> keluar. Jangan lupa berkunjung kembali '.Yii::app()->user->name.'!');
			$this->redirect(Yii::app()->homeUrl);
		}else{
			Yii::app()->user->setFlash('warning', 'Anda <strong>gagal</strong> masuk.');
			$this->redirect(Yii::app()->homeUrl);
		}
	}
	
	public function actionStatistik()
	{
		$bulan=date('m');
		$bulan1=date('Y-m-1');
		$bulan2=date('Y-m-t');
		if($bulan<7){
			$smt=2;
			//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
			$th_ajar=(date('Y')-1).'/'.date('Y');
		}elseif($bulan<13 && $bulan>6){
			$smt=1;
			//jika th 1(7-12) maka tahun/tahun+1 2012/2013
			$th_ajar=date('Y').'/'.(date('Y')+1);
		}
		//Grafik Presensi Dalam 1 semester
		$presensi="SELECT count(nis) as jum,status FROM presensi where th_ajar='".$th_ajar."' and semester='".$smt."' GROUP BY status";
		$presensismt=new CSqlDataProvider($presensi,array(
				'keyField' => 'nis',
				'pagination'=>array(
						'pageSize'=>70,
				),
		));
		
		$presensibln="SELECT count(nis) as jum,status FROM presensi where tanggal<='".$bulan2."' and tanggal>='".$bulan1."' and th_ajar='".$th_ajar."' and semester='".$smt."' GROUP BY status";
		$presensibulan=new CSqlDataProvider($presensibln,array(
				'keyField' => 'nis',
				'pagination'=>array(
						'pageSize'=>70,
				),
		));
		
		$presensihar="SELECT count(nis) as jum,status FROM presensi where tanggal='".date('Y-m-d')."' and th_ajar='".$th_ajar."' and semester='".$smt."' GROUP BY status";
		$presensihari=new CSqlDataProvider($presensihar,array(
				'keyField' => 'nis',
				'pagination'=>array(
						'pageSize'=>70,
				),
		));
	
		//Grafik Jam mengajar
		$guru='SELECT count(kode_guru), kode_guru FROM jadwal GROUP BY kode_guru';
		$kode_guru=new CSqlDataProvider($guru,array(
				'keyField' => 'kode_guru',
				'pagination'=>array(
						'pageSize'=>70,
				),
		));
	
		//Grafik Jurnal Mengajar
		$jurnal2="SELECT count(kode_guru),kode_guru FROM jurnal where th_ajar='".$th_ajar."' and semester='".$smt."' GROUP BY kode_guru";
		$jurnal=new CSqlDataProvider($jurnal2,array(
				'keyField' => 'kode_guru',
				'pagination'=>array(
						'pageSize'=>70,
				),
		));
		
		//Grafik Nilai
		if(Yii::app()->user->checkAccess('Mapel') || Yii::app()->user->checkAccess('Wali')){
			$nilaiku="SELECT count(kode_guru), na FROM nilai where th_ajar='".$th_ajar."' and semester='".$smt."' and kode_guru='".Yii::app()->user->id."' GROUP BY na";
		}else{
			$nilaiku="SELECT count(kode_guru), na FROM nilai where th_ajar='".$th_ajar."' and semester='".$smt."' GROUP BY na";
		}
		$setnilai=new CSqlDataProvider($nilaiku,array(
				'keyField' => 'kode_mapel',
				'pagination'=>array(
						'pageSize'=>70,
				),
		));
		
		$this->render('statistik',array(
				'presensismt'=>$presensismt,
				'presensibulan'=>$presensibulan,
				'presensihari'=>$presensihari,
				'kode_guru'=>$kode_guru,
				'jurnal'=>$jurnal,
				'setnilai'=>$setnilai
		));
	}
}