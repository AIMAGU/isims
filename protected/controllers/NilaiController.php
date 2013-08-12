<?php

class NilaiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id,$id2,$id3,$id4)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id,$id2,$id3,$id4),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
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
		//Action search dialog
		$model2=new Penempatan('search');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Penempatan']))
			$model2->attributes=$_GET['Penempatan'];
		
		//Action create
		$model=new Nilai;

		if(isset($_POST['Nilai']))
		{
			$kode_mapel=Yii::app()->db->createCommand("select kode_mapel from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
			$kurikulum=Yii::app()->db->createCommand("select kurikulum from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
			$kelas=Yii::app()->db->createCommand("select kelas from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
			
			$valid=true;
			try {
				if(isset($_GET['nis'])){
					
					foreach($_POST['Nilai'] as $i=>$ii){
						$model = new Nilai();
						$model -> attributes = $_POST['Nilai'][$i];
						$model -> nis = $_GET['nis'];
						$model -> kode_mapel = $kode_mapel;
						$model -> kode_guru = Yii::app()->user->id;
						$model -> kurikulum = $kurikulum;
						$model -> th_ajar = $th_ajar;
						$model -> semester = $smt;
							
						if($kelas!=6){
							$model -> un = 0;
							$model -> uas = 0;
						}
							
						//$valid=$model->validate()&&$valid;
						$model -> save();
							
					}
				}else{
					foreach($_POST['Nilai'] as $i=>$ii){
						$model = new Nilai();
						$model -> attributes = $_POST['Nilai'][$i];
						$model -> kode_mapel = $kode_mapel;
						$model -> kode_guru = Yii::app()->user->id;
						$model -> kurikulum = $kurikulum;
						$model -> th_ajar = $th_ajar;
						$model -> semester = $smt;
							
						if($kelas!=6){
							$model -> un = 0;
							$model -> uas = 0;
						}
							
						$valid=$model->validate()&&$valid;
						$model -> save();
					
					}	
				}
				
				if($model -> save() || $valid){
					Yii::app()->user->setFlash('success', 'Nilai <strong>berhasil</strong> disimpan.');
					//$this->redirect(array('admin'));
					$this->refresh();
				}
			}
			catch(CDbException $e) {
				Yii::app()->user->setFlash('warning', '<strong>Beberapa nilai sudah tersimpan.</strong> Silahkan periksa kembali.');
				$model->addError(null, "Beberapa nilai sudah tersimpan. Silahkan periksa kembali");
				$this->refresh();
			}
		}
		

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$id2,$id3,$id4)
	{
		$this->layout='//layouts/column1';
		
		//Action search dialog
		$model2=new Penempatan('search');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Penempatan']))
			$model2->attributes=$_GET['Penempatan'];
		
		$model=$this->loadModel($id,$id2,$id3,$id4);

		if(isset($_POST['Nilai']))
		{
			$model->attributes=$_POST['Nilai'];
			try {
				if($model->save())
				Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> diperbarui.');
				$this->redirect(array('view','id'=>$model->nis,'id2'=>$model->kode_mapel,'id3'=>$model->th_ajar,'id4'=>$model->semester));
			}
			catch(CDbException $e) {
				$model->addError(null, $e->getMessage());
			}
			
		}

		$this->render('update',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id,$id2,$id3,$id4)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id,$id2,$id3,$id4)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				Yii::app()->user->setFlash('info', 'Nilai <strong>berhasil</strong> dibersihkan');
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('create'));
				//$this->refresh();
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Nilai('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nilai'])){
			if(($_GET['Nilai']['nis'])==0 && ($_GET['Nilai']['nis'])!=null){
				$model->attributes=$_GET['Nilai'];
				Yii::app()->user->setFlash('warning', 'Data gagal diproses. <b>NIS</b> tidak boleh kosong atau 0');
			}else{
				$model->attributes=$_GET['Nilai'];
				Yii::app()->user->setFlash('success', 'Data berhasil diproses. Tekan tombol <strong>CETAK</strong> untuk melihat raport!');
			}
		}else $model->nis = 0;

		if (Yii::app()->user->isGuest) {
			$this->layout='//layouts/column1';
		} else{
			$this->layout='//layouts/column2';
		}
		//$dataProvider=new CActiveDataProvider('Nilai');
		$this->render('index',array(
			//'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Nilai('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nilai']))
			$model->attributes=$_GET['Nilai'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
public function loadModel($id,$id2,$id3,$id4)
	{
		$model=Nilai::model()->findByAttributes(array('nis'=>$id,'kode_mapel'=>$id2, 'th_ajar'=>$id3, 'semester'=>$id4));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='nilai-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGenerateExcel()
	{
		$session=new CHttpSession;
		$session->open();
	
		if(isset($session['Nilai_records']))
		{
			$model=$session['Nilai_records'];
		}
		else
			$model = Nilai::model()->findAll();
	
	
		Yii::app()->request->sendFile(Yii::app()->name.date('YmdHis').'.xls',
		$this->renderPartial('excelReport', array(
		'model'=>$model
		), true));
	}
	
	public function actionImportExcel()
	{
		error_reporting(E_ALL ^ E_NOTICE);
		$model=new Nilai;
		if(isset($_POST['Nilai']))
		{
			$bulan=date('m');
			if($bulan<7){
				$smt2=2;
				//jika th 2(1-6) maka tahun-1/tahun-2 2012/2013
				$th_ajar2=(date('Y')-1).'/'.date('Y');
			}elseif($bulan<13 && $bulan>6){
				$smt2=1;
				//jika th 1(7-12) maka tahun/tahun+1 2012/2013
				$th_ajar2=date('Y').'/'.(date('Y')+1);
			}
			Yii::import('ext.ocim.excelread.JPhpExcelReader');
			$model->attributes=$_POST['Nilai'];
			if(strlen(trim(CUploadedFile::getInstance($model,'filee'))) > 0)
			{
				//Proses upload dan rename file menjadi Karyawan.xls
				$unggah=CUploadedFile::getInstance($model,'filee');
				$path=Yii::app()->getBasePath().'/extensions/ocim/excelread/nilai.xls';
				$unggah->saveAs($path);
				//$data = new Spreadsheet_Excel_Reader($path);
				$data = new JPhpExcelReader($path);
				$nis = array();
				$kode_mapel = array();
				$kode_guru = array();
				$kelas = array();
				$lokal = array();
				$na = array();
				$un = array();
				$uas = array();
				$kurikulum = array();
				$th_ajar = array();
				$semester = array();
				$kodemapel=array();
				$setkurikulum=array();
				//Pembacaan coloumb ex: A, B, C (Horizontal)
				for ($j=1; $j <= $data->sheets[0]['numRows']; $j++)
				{
					//nama sheet(dimulai dari 0,1,dst) | array (jumlah row yang dibaca. Vertikal) | coloumb ke.. (Horizontal)
					$nis[$j]=$data->sheets[0]['cells'][$j][2]; //Ini 2
					$kelas[$j]=$data->sheets[0]['cells'][$j][4]; //Ini 4
					$lokal[$j]=$data->sheets[0]['cells'][$j][5]; //Ini 5
					$kode_mapel[$j]=$data->sheets[0]['cells'][$j][6]; //ini 6
					$na[$j]=$data->sheets[0]['cells'][$j][7]; //Ini 7
					$un[$j]=$data->sheets[0]['cells'][$j][8]; //Ini 8
					$uas[$j]=$data->sheets[0]['cells'][$j][9]; //Ini 9
					$th_ajar[$j]=$th_ajar2;
					$semester[$j]=$smt2;
					$kodemapel[$j]=Yii::app()->user->id;
					$setkurikulum[$j]=Yii::app()->db->createCommand("select kurikulum from jadwal where kode_guru='".Yii::app()->user->id."' limit 1;")->queryScalar();
				}
				$aku = $data->rowcount(0);
				$rowExist = array();
				//try {
					//if($aku){
						//mengambil data dari row ke A2 ke bawah sampai data file habis karena di baca oleh variabel aku dengan sintaks "rowcount" (menghitung jumlah row yang ada isinya)
						for($i = 2; $i <= $aku; $i++)
						{
							$isExist = Nilai::model()->exists(
							array(
								//'select'=>'id',
								'condition'=>'nis = :nis AND kode_mapel = :kode_mapel AND th_ajar = :th_ajar AND semester = :semester',
								'params'=>array(
										':nis'=>(string)$nis[$i],
										':kode_mapel'=>$kode_mapel[$i],
										':th_ajar'=>$th_ajar[$i],
										':semester'=>(string)$semester[$i]
								),
							));
							
							if ($isExist) {
								$rowExist[] = array(
										'nis'=>$nis[$i],
										'kode_mapel'=>$kode_mapel[$i],
										'th_ajar'=>$th_ajar[$i],
										'semester'=>$semester[$i]
								);
								$a=0;
							}else{
								$model=new Nilai;
								$model->nis=$nis[$i]; //2
								$model->kelas=$kelas[$i]; //4
								$model->lokal=$lokal[$i]; //5
								$model->kode_mapel=$kode_mapel[$i]; //6
								$model->na=$na[$i]; //7
								$model->un=$un[$i]; //8
								$model->uas=$uas[$i]; //9
								$model->th_ajar=$th_ajar[$i];
								$model->semester=$semester[$i];
									
								//Deklarasi default
								$model->kode_guru=$kodemapel[$i];
								$model->kurikulum=$setkurikulum[$i];
								/*echo "<pre>";
								print_r($model->getAttributes());
								echo "</pre>";
								die();*/
								$model->save();
							}
							
						}
						if($a==0){
							Yii::app()->user->setFlash('error', '<strong>Beberapa data sudah ada dalam database.</strong> Silahkan periksa kembali.');
							//$this->redirect(array('admin'));
						}else{
							Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> di unggah. Terima kasih');
						}
						unlink($path);
					//}
				/*}
				catch(CDbException $e) {
					Yii::app()->user->setFlash('warning', '<strong>Data sudah ada dalam database.</strong> Silahkan periksa kembali.');
					$model->addError(null, "Data sudah ada dalam database. Silahkan periksa kembali");
				}*/
				}
				else {
					Yii::app()->user->setFlash('error', 'Data <strong>gagal</strong> di unggah. Silahkan periksa file anda.');
				}
		}
		$this->render('ImportExcel',array(
			'model'=>$model,
			'rowExist'=>$rowExist
		));
	}
	
	public function actionTemplate(){
		//Template excel untuk import xlsx to db
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
	
		Yii::import('ext.phpexcel.Classes.PHPExcel', true);
		$objPHPExcel = new PHPExcel();
		$ocim=$objPHPExcel->setActiveSheetIndex();
		// Set document properties
		$objPHPExcel->getProperties()
		->setCreator(date('d-m-Y'))
		->setLastModifiedBy(date('d-m-Y'))
		->setTitle("Nur Rochim | ISIMS")
		->setSubject("Raport I-SIMS Penilaian")
		->setDescription("Raport I-SIMS Penilaian")
		->setKeywords("Raport I-SIMS Penilaian")
		->setCategory("Raport I-SIMS Penilaian");
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		
		$kelas=Yii::app()->db->createCommand("select kelas from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		$lokal=Yii::app()->db->createCommand("select lokal from jadwal where kode_guru='".Yii::app()->user->id."';")->queryScalar();
		$penempatan = Penempatan::model()->findAll(array(
				'condition'=>"kelas='".$kelas."' and lokal='".$lokal."' and th_ajar='".$th_ajar."'",
		));
		
		$tebal = array(
			'font' => array(
					'bold' => true,
			),
		);
		
		$ocim
		->setCellValue("A1", "NO")
		->setCellValue("B1", "NIS")
		->setCellValue("C1", "NAMA")
		->setCellValue("D1", "KELAS")
		->setCellValue("E1", "LOKAL")
		->setCellValue("F1", "KODE MAPEL")
		->setCellValue("G1", "NILAI")
		->setCellValue("H1", "NILAI UN")
		->setCellValue("I1", "NILAI UAS")
		->getStyle("A1:I1")->applyFromArray($tebal);
		
		$arraypen = array();
		foreach($penempatan as $pen){
			$arraypen[] = array(
					'nis'=>$pen->nis,
					'nama_lengkap'=>$pen->nis0->nama_lengkap,
					'kelas' => $pen->kelas,
					'lokal' => $pen->lokal,
			);
		}
		foreach($arraypen as $k => $u){
			$ocim
			// A 1, value di array
			->setCellValue('A'.($k+2), $k+1) //Cetak No
			->setCellValue('B'.($k+2), $u['nis']) //cetak mapel
			->setCellValue('C'.($k+2), $u['nama_lengkap'])
			->setCellValue('D'.($k+2), $u['kelas'])
			->setCellValue('E'.($k+2), $u['lokal']);
		}
		
		//Berikan Border All
		$semua = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
				),
			),
		);
		$ocim->getStyle('A1:I'.($k+2))->applyFromArray($semua);
		
		$objPHPExcel->setActiveSheetIndex(0);
			
		ob_end_clean();
		ob_start();
		
		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="isims"'.date("dmY-His").'');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	
	}
	
	/**
	 * Manajemen raport siswa (edit,create,dll).
	 */
	public function actionRaport()
	{
		$this->layout='//layouts/column1';
		$model=new Nilai();
		$ekstraku=new Trekstra();
		$pribadiku=new Trpribadi();
		$presensiku=new Presensi();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nilai'])){
			$model->attributes=$_GET['Nilai'];
		}
		
		$this->render('raport',array(
			'model'=>$model,
			'ekstraku'=>$ekstraku,
			'pribadiku'=>$pribadiku,
			'presensiku'=>$presensiku,
		));
	}
	
	/**
	 * Manages raport PDF siswa per @ cetak.
	 */
	public function actionPdf()
	{
		$this->layout='//layouts/mainbeda';
		$model=new Nilai();
		$ekstraku=new Trekstra;
		$pribadiku=new Trpribadi;
		$presensiku=new Presensi;
		
		# mPDF
		$mpdf = Yii::app()->ePdf->mpdf('c','A4','','',42,15,67,67,20,15);
		//$mpdf = Yii::app()->ePdf->mpdf('en-GB-x','A4','','',32,25,27,25,16,13);
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetColumns(2,'J'); //Agar menjadi 2 kolom
		$mpdf->mirrorMargins = 2;
		$mpdf->AddPage('L','','','','',10,10,10,10); //kanan, kiri, atas, bawah (Separo:10,150,10,20)
		$mpdf->setFooter('{PAGENO}') ;
		# render (full page)
		$mpdf->WriteHTML($this->render('pdf', array(
				'model'=>$model,
				'ekstraku'=>$ekstraku,
				'pribadiku'=>$pribadiku,
				'presensiku'=>$presensiku,
		), true));
		
		# Watermark Tulisan gan!
		//$mpdf->SetWatermarkText(Yii::app()->params['title']);
		//$mpdf->watermark_font = 'DejaVuSansCondensed';
		//$mpdf->showWatermarkText = true;
		
		# Watermark Gambar
		//$mpdf->SetWatermarkImage(Yii::app()->request->baseUrl.'/images/logo2.png', 0.15, 'F');
		//$mpdf->showWatermarkImage = true;
		
		# Outputs ready PDF
		$mpdf->Output(Yii::app()->params['title'].'.pdf','I');
		exit;
	}
	
	//Cetak Raport Excel Mulai Gan!
	public function actionExcel(){
		//Validasi Raport gan!
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
		
		Yii::import('ext.phpexcel.Classes.PHPExcel', true);
		$objPHPExcel = new PHPExcel();
		
		// Set document properties
		$objPHPExcel->getProperties()
			->setCreator("Nur Rochim")
			->setLastModifiedBy("Nur Rochim")
			->setTitle("Raport")
			->setSubject("Raport I-SIMS Penilaian")
			->setDescription("Raport I-SIMS Penilaian")
			->setKeywords("Raport I-SIMS Penilaian")
			->setCategory("Raport I-SIMS Penilaian");
	
		$styleBold = array(
				'font' => array(
						'bold' => true,
				), 
				'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'startcolor' => array(
								'rgb' => 'FF9900',
						),
				),
		);
		
		$styleBackground = array(
				'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'startcolor' => array(
								'rgb' => 'FF9900',
						),
				),
				'font'    => array(
						'name'      => 'Arial',
						'size'        => 12,
						'bold'      => true,
				),
		);
		
		$styleArray = array(
				'font' => array(
						'bold' => true,
				),
				'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
						'wrap' => PHPExcel_Style_Alignment::VERTICAL_TOP,
				),
				'borders' => array(
					'horizontal' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
					),
				),
		);
		
		$tengah = array(
				'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
						'wrap' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
				'borders' => array(
						'allborders' => array(
								'style' => PHPExcel_Style_Border::BORDER_THIN,
						),
				),
		);
		
		$tebalgaristengah = array(
				'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'wrap' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
				'borders' => array(
						'allborders' => array(
								'style' => PHPExcel_Style_Border::BORDER_THIN,
						),
				),
				'font' => array(
						'bold' => true,
				),
				'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'startcolor' => array(
								'rgb' => 'FF9900',
						)
				),
		);
		
		$tebalgariskanan = array(
				'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
						'wrap' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
				'font' => array(
						'bold' => true,
				),
		);
		
	//Di aliaskan
		$ocim=$objPHPExcel->setActiveSheetIndex();
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		
	//Set Judul di merge
		$ocim->setCellValue("A1", 'LAPORAN HASIL BELAJAR SISWA')->getStyle("A1:E1")->applyFromArray($styleBackground);
		$ocim->mergeCells("A1:E1");
		$ocim->getStyle("A1:E1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$ocim->getRowDimension(1)->setRowHeight(22);
		$ocim->getRowDimension(2)->setRowHeight(20);
	//Set Widthnya gan!
		/*$ocim->getColumnDimension("A")->setWidth(5);
		$ocim->getColumnDimension("B")->setWidth(40);
		$ocim->getColumnDimension("C")->setWidth(10);
		$ocim->getColumnDimension("D")->setWidth(10);
		$ocim->getColumnDimension("E")->setWidth(10);*/
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		
	//Nilai Raport Mulai
		$nilai = Nilai::model()->findAll(array(
				'condition'=>"nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."'",
				'order'=>'kode_mapel ASC'
		));
		
		$arraynilai = array();
		foreach($nilai as $nil){
			$arraynilai[] = array(
					'nama'=>$nil->nis0->nama_lengkap,
					'kode_mapel' => $nil->kodeMapel->kodeMapel->mapel,
					'kkm' => $nil->kodeMapel->kodeMapel->kkm,
					'na' => $nil->na,
			);
		}
		
		//Header info siswa mulai
		$objPHPExcel->getActiveSheet()->getStyle('A3:E6')->applyFromArray($styleArray);
		$ocim->setCellValue("A3", "Nama : ".$nil->nis0->nama_lengkap);
		$ocim->mergeCells("A3:B3");
		
		$ocim->setCellValue("A4", "Nomor Induk :".$nil->nis);
		$ocim->mergeCells("A4:B4");
		
		$ocim->setCellValue("A5", "Nama Sekolah : ".Yii::app()->params['title']);
		$ocim->mergeCells("A5:B5");
		
		$ocim->setCellValue("A6", "Alamat Sekolah : ".Yii::app()->params['subtitle']);
		$ocim->mergeCells("A6:E7");
		$ocim->getStyle("A6:E7")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
		$ocim->getStyle("A6:E7")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$ocim->setCellValue("D3", "Kelas : ".$nil->kelas." ".$nil->lokal);
		$ocim->mergeCells("D3:E3");
		
		$ocim->setCellValue("D4", "Semester : ".$nil->semester);
		$ocim->mergeCells("D4:E4");
		
		$ocim->setCellValue("D5", "Tahun Pelajaran : ".$nil->th_ajar);
		$ocim->mergeCells("D5:E5");
		
		//Header info siswa selesai		
		
		$ocim
		->setCellValue("A9", "No")
		->setCellValue("B9", "Mata Pelajaran")
		->setCellValue("C9", "KKM*")
		->setCellValue("D9", "Nilai")
		->setCellValue("E9", "NRK**")
		->getStyle("A9:E9")->applyFromArray($styleBold);
		
		foreach($arraynilai as $k => $u){
			$ocim
			// A 1, value di array
			->setCellValue('A'.($k+10), $k+1) //Cetak No
			->setCellValue('B'.($k+10), $u['kode_mapel']) //cetak mapel
			->setCellValue('C'.($k+10), $u['kkm']) //cetak kkm
			->setCellValue('D'.($k+10), $u['na']) //cetak nilai akhir
			->setCellValue('E'.($k+10), $u['kkm']); //cetak kkm
		}
		$akhir=Yii::app()->db->createCommand("select count(nis) from nilai where nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."';")->queryScalar();
		//Jumlah nilai akhir
		$ocim->setCellValue('A'.($akhir+12), "Jumlah Nilai Prestasi Hasil Belajar ")
		->mergeCells("A".($akhir+12).":B".($akhir+12));
		$objPHPExcel->getActiveSheet()->getCell('C'.($akhir+12))->setValue('=SUM(D10:D23)');
		
		//Jumlah Rata-rata Hasil Belajar:
		$ocim->setCellValue('A'.($akhir+13), "Rata-rata Hasil Belajar ")
		->mergeCells("A".($akhir+13).":B".($akhir+13));
		$objPHPExcel->getActiveSheet()->getCell('C'.($akhir+13))->setValue("=SUM(D10:D23)/".$akhir."");
		
		foreach ($nilai as $i=>$ii){
			$model=new Nilai;
			$rata2=Yii::app()->db->createCommand("select sum(na)/count(na) from nilai where kode_mapel='".$ii['kode_mapel']."' and th_ajar='".$th_ajar."' and semester='".$smt."';")->queryScalar();
			echo $rata2."<br>";
			$ocim->setCellValue('E'.($i+10), $rata2);
		}
	//Nilai Raport Selesai
		
	//Berikan Border All
		$semua = array(
				'borders' => array(
						'allborders' => array(
								'style' => PHPExcel_Style_Border::BORDER_THIN,
						),
				),
		);
		$ocim->getStyle('A9:E'.($akhir+10))->applyFromArray($semua);
		
	//Ekstra Mulai
		$ekstra = Trekstra::model()->findAll(array(
			'condition'=>"nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."'",
		));
		
		$arrayekstra = array();
		foreach($ekstra as $eks){
			$arrayekstra[] = array(
					'nama_ekstra' => $eks->idEkstra->nama_ekstra,
					'nilai_ekstra' => $eks->nilai_ekstra,
			);
		}
		
		$ocim
		->setCellValue("A".($akhir+15), "No")
		->setCellValue("B".($akhir+15), "KEGIATAN EKSTRAKURIKULER")
		->setCellValue("E".($akhir+15), "NILAI")
		->getStyle("A".($akhir+15).":E".($akhir+15))->applyFromArray($styleBold);
		$ocim->mergeCells("B".($akhir+15).":D".($akhir+15));
		
		foreach($arrayekstra as $oc => $im){
			$ocim
			// A 1, value di array
			->setCellValue('A'.($akhir+16+$oc), $oc+1) //Cetak No
			->setCellValue('B'.($akhir+16+$oc), $im['nama_ekstra']) //cetak mapel
			->setCellValue('E'.($akhir+16+$oc), $im['nilai_ekstra']) //cetak kkm
			->mergeCells("B".($akhir+16+$oc).":D".($akhir+16+$oc));
		}
		$ocim->getStyle('A'.($akhir+15).':E'.($akhir+16+$oc))->applyFromArray($semua);
	//Ekstra Selesai 
	
	//Pribadi Mulai
		$akhir2=Yii::app()->db->createCommand("select count(nis) from tr_ekstra where nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."';")->queryScalar();
		$pribadi = Trpribadi::model()->findAll(array(
			'condition'=>"nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."' and id_pribadi not in (4,5)",
		));
		
		$arraypribadi = array();
		foreach($pribadi as $pri){
			$arraypribadi[] = array(
					'nama_pribadi' => $pri->idPribadi->nama_pribadi,
					'nilai_pribadi' => $pri->nilai_pribadi,
					'catatan'=>$pri->catatan,
			);
		}
		
		$ocim
		->setCellValue("A".($akhir+17+$akhir2), "No")
		->setCellValue("B".($akhir+17+$akhir2), "KEPRIBADIAN")
		->setCellValue("C".($akhir+17+$akhir2), "NILAI")
		->getStyle("A".($akhir+17+$akhir2).":C".($akhir+17+$akhir2))->applyFromArray($styleBold);
		
		foreach($arraypribadi as $oc => $im){
			$ocim
			// A 1, value di array
			->setCellValue('A'.($akhir+18+$akhir2+$oc), $oc+1) //Cetak No
			->setCellValue('B'.($akhir+18+$akhir2+$oc), $im['nama_pribadi']) //cetak mapel
			->setCellValue('C'.($akhir+18+$akhir2+$oc), $im['nilai_pribadi']); //cetak kkm
		}
		$ocim->getStyle('A'.($akhir+17+$akhir2).':E'.($akhir+18+$akhir2+$oc))->applyFromArray($semua);
	//Pribadi Selesai
	
	//Keterangan KKM dan NRK
		$ocim
		// A 1, value di array
		->setCellValue('A'.($akhir+20+$akhir2+$oc), "*) Kriteria Ketuntasan Minimal") //Cetak No
		->setCellValue('A'.($akhir+21+$akhir2+$oc), "**) Nilai Rata-Rata Kelas")
		->mergeCells("A".($akhir+20+$akhir2+$oc).":E".($akhir+20+$akhir2+$oc))
		->mergeCells("A".($akhir+21+$akhir2+$oc).":E".($akhir+21+$akhir2+$oc));
		$ocim->getStyle("A".($akhir+20+$akhir2+$oc).":E".($akhir+21+$akhir2+$oc))->getFont()->setSize(8);
	
	//Presensi Mulai
		$akhir2=Yii::app()->db->createCommand("select count(nis) from tr_ekstra where nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."';")->queryScalar();
		$pribadi = Trpribadi::model()->findAll(array(
				'condition'=>"nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."' and id_pribadi not in (4,5)",
		));
		
		$arraypribadi = array();
		foreach($pribadi as $pri){
			$arraypribadi[] = array(
					'nama_pribadi' => $pri->idPribadi->nama_pribadi,
					'nilai_pribadi' => $pri->nilai_pribadi,
					'catatan'=>$pri->catatan,
			);
		}
		
		$ocim
		->setCellValue("D".($akhir+17+$akhir2), "KETIDAKHADIRAN")
		->setCellValue("E".($akhir+17+$akhir2), "HARI")
		->getStyle("D".($akhir+17+$akhir2).":E".($akhir+17+$akhir2))->applyFromArray($styleBold);
		
		$sakit = Presensi::model()->countByAttributes(array(
				'nis'=> $_GET['id'],
				'status'=>'S',
				'th_ajar'=>$th_ajar,
				'semester'=>(string)$smt
		));
		
		$izin = Presensi::model()->countByAttributes(array(
				'nis'=> $_GET['id'],
				'status'=>'I',
				'th_ajar'=>$th_ajar,
				'semester'=>(string)$smt
		));
		
		$alpha = Presensi::model()->countByAttributes(array(
				'nis'=> $_GET['id'],
				'status'=>'A',
				'th_ajar'=>$th_ajar,
				'semester'=>(string)$smt
		));
		
		$ocim
		->setCellValue("D".($akhir+18+$akhir2), "Sakit")
		->setCellValue("D".($akhir+19+$akhir2), "Izin")
		->setCellValue("D".($akhir+20+$akhir2), "Alpha")
		->setCellValue("E".($akhir+18+$akhir2), $sakit)
		->setCellValue("E".($akhir+19+$akhir2), $izin)
		->setCellValue("E".($akhir+20+$akhir2), $alpha);
	//Presensi Selesai
	
	//Tentang Mulai
		$objPHPExcel->getActiveSheet()->getStyle('G4:L9')->applyFromArray($tengah);
		$ocim->setCellValue("G3", 'CATATAN TENTANG PENGEMBANGAN DIRI')
		->mergeCells("G3:L3")
		->getStyle("G3:L3")->applyFromArray($tebalgaristengah);
		$pribadi2 = Trpribadi::model()->findAll(array(
				'condition'=>"nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."' and id_pribadi=5",
		));
		$arraypribadi2 = array();
		foreach($pribadi2 as $pri2){
			$arraypribadi2[] = array(
					$ocim->setCellValue("G4", $pri2->catatan),
					$ocim->mergeCells("G4:L9")
			);
		}
	//Tentang selesai
		
	//Catatan
		$objPHPExcel->getActiveSheet()->getStyle('G12:L17')->applyFromArray($tengah);
		$ocim->setCellValue("G11", 'CATATAN')
		->mergeCells("G11:L11")
		->getStyle("G11:L11")->applyFromArray($tebalgaristengah);
		$pribadi2 = Trpribadi::model()->findAll(array(
				'condition'=>"nis='".$_GET['id']."' and th_ajar='".$th_ajar."' and semester='".$smt."' and id_pribadi=4",
		));
		$arraypribadi2 = array();
		foreach($pribadi2 as $pri2){
			$arraypribadi2[] = array(
					$ocim->setCellValue("G12", $pri2->catatan),
					$ocim->mergeCells("G12:L17")
			);
		}
	//Catatan selesai
	//Tanggal
		$tanggalbawah=date('d F Y');
		$ocim->setCellValue("G19", 'Karanganyar, '.$tanggalbawah)
		->mergeCells("G19:L19")
		->getStyle("G19:L19")->applyFromArray($tebalgariskanan);
		
	//TTD
		$raport=Nilai::model()->find(array(
				'condition'=>"nis='".$_GET['id']."'"
		));
		
		$ocim->setCellValue("K20", 'Wali Kelas')
		->mergeCells("K20:L20")
		->getStyle("G20:L20")->applyFromArray($tebalgariskanan);
		
		$ocim->setCellValue("G20", 'Orang Tua/Wali')
		->mergeCells("G20:H20")
		->getStyle("G20:H20")->applyFromArray($tebalgariskanan);
		
		$ocim->setCellValue("K24", $raport->kodeGuru->nama_guru)
		->mergeCells("K24:L24")
		->getStyle("G24:L24")->applyFromArray($tebalgariskanan);
		
		//NIP
		$ocim->setCellValue("K25", "NIP.".$raport->kodeGuru->nip)
		->mergeCells("K25:L25")
		->getStyle("G25:L25")->applyFromArray($tebalgariskanan);
		
		$ocim->setCellValue("G24", '(_____________)')
		->mergeCells("G24:H24")
		->getStyle("G24:H24")->applyFromArray($tebalgariskanan);
		
		$objPHPExcel->setActiveSheetIndex(0);
		 
		ob_end_clean();
		ob_start();
	
		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="ocim.xlsx"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}
	//Excel Raport Selesai
	
	//Untuk Editable Pribadi
	public function actionPribadiedit()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			Yii::import('bootstrap.widgets.TbEditableSaver');
			$es=new TbEditableSaver('Trpribadi');
			$es->update();
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	//Untuk Editable Ekstrakurikuler
	public function actionEkstraedit()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			Yii::import('bootstrap.widgets.TbEditableSaver');
			$es=new TbEditableSaver('Trekstra');
			$es->update();
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	//Menghitung rata-rata kelas di raport
	public function ratakelas()
	{
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
		$nilai = Nilai::model()->findAll(array(
				//'select'=>'kode_mapel',
				'condition' => "nis='".$_GET['id']."'",
				'order'=>'kode_mapel ASC'
				//'select'=>'sum(na)/count(na) as rata',
				//'condition'=>"kode_mapel='BI' and th_ajar='".$th_ajar."' and semester='".$smt."'",
		));
		foreach ($nilai as $i=>$ii){
			$model=new Nilai;
			$rata2=Yii::app()->db->createCommand("select sum(na)/count(na) from nilai where kode_mapel='".$ii['kode_mapel']."' and th_ajar='".$th_ajar."' and semester='".$smt."';")->queryScalar();
			echo $rata2."<br>";
		}
	}
	
	public function actionArsip()
	{
		$this->layout='//layouts/column1';
		$model=new Nilai('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nilai'])){
			if(($_GET['Nilai']['nis'])==0 && ($_GET['Nilai']['nis'])!=null){
				$model->attributes=$_GET['Nilai'];
				Yii::app()->user->setFlash('warning', 'Data gagal diproses. <b>NIS</b> tidak boleh kosong atau 0');
			}else{
				$model->attributes=$_GET['Nilai'];
				Yii::app()->user->setFlash('success', 'Data berhasil diproses. Tekan tombol <strong>CETAK</strong> untuk melihat raport!');
			}
		}else $model->nis = 0;
	
		$this->render('arsip',array(
				'model'=>$model,
		));
	}
}