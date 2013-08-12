<?php

class PenempatanController extends Controller
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Penempatan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Penempatan']))
		{
			$model->attributes=$_POST['Penempatan'];
			try {
				if($valid){
					$model -> save();
					Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> ditambahkan. Terima kasih');
					$this->redirect(array('view','id'=>$model->id_penempatan_kls));
				}
			}
			catch(CDbException $e) {
				$model->addError(null, $e->getMessage());
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Penempatan']))
		{
			$model->attributes=$_POST['Penempatan'];
			if($model->save())
				Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> diperbarui. Terima kasih');
				$this->redirect(array('view','id'=>$model->id_penempatan_kls));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> dihapus. Terima kasih');
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->layout='//layouts/column1';
		$model=new Penempatan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Penempatan'])){
			$model->attributes=$_GET['Penempatan'];
		}
		
		if(isset($_POST['hapus']) && isset($_POST['tombolhapus'])){
			foreach ($_POST['hapus'] as $a => $val) {
				$this->loadModel($val)->delete();
			}
		}
		
		$this->render('index',array(
				'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout='//layouts/column1';
		$model=new Penempatan('search'); //Asli admin
		$model2=new ThAjar;
		$model->unsetAttributes();  // clear any default values Asli admin
		if(isset($_GET['Penempatan'])) //Asli admin
			$model->attributes=$_GET['Penempatan']; //Asli admin
			//Set validasi create th_ajar otomatis
			$tanggal1=Yii::app()->db->createCommand("select th_ajar from th_ajar where th_ajar='".date('Y').'/'.(date('Y')+1)."';")->queryScalar();
			$tanggal2=date('Y').'/'.(date('Y')+1);
			//$vari=array();
			
			//Penempatan oleh wali kelas
			if(isset($_POST['naik']))
			{
				//Validasi dari set validasi (Create th_ajar otomatis)
				if($tanggal1!=$tanggal2){
					$model2=new ThAjar();
					$model2->th_ajar = date('Y').'/'.(date('Y')+1);
					$model2->save();
				}
				
				$valid=true;
				foreach($_POST['naik'] as $a=>$val)
				{
					$simpan=$this->loadModel($val);
					$model=new Penempatan;
					
					//Tinggal kelas
					if (isset($_POST['tomboltidaknaik'])) {
						$model->nis = $simpan->nis;
						$model->kelas = ($simpan->kelas);
						$model->lokal = $simpan->lokal;
						$model->th_ajar = date('Y').'/'.(date('Y')+1);
						$status=0;
						
					}
					elseif(isset($_POST['tombolnaik'])){
						//Naik kelas
						$model->nis = $simpan->nis;
						$model->kelas = ($simpan->kelas)+1;
						$model->lokal = $simpan->lokal;
						$model->th_ajar = date('Y').'/'.(date('Y')+1);
						$status=1;
					}
					
					$valid=$model->validate()&&$valid;
					$model->save();
				}
				if($valid || $model -> save()){
					if($status==1){
						Yii::app()->user->setFlash('success', 'Proses kenaikan kelas <strong>berhasil!</strong>. Terima kasih');
					}else{
						Yii::app()->user->setFlash('info', 'Proses tinggal kelas <strong>berhasil!</strong>. Terima kasih');
					}
					$this->refresh();
					//$this->redirect(array('admin'));
				}
			}
			
			//Penempatan oleh kurikulum secara random kelas1
			elseif((isset($_POST['kelas1']) && isset($_POST['tombol1'])) || (isset($_POST['kelas2'])&& isset($_POST['tombol2'])) || (isset($_POST['kelas3'])&& isset($_POST['tombol3'])) || (isset($_POST['kelas4'])&& isset($_POST['tombol4'])) || (isset($_POST['kelas5'])&& isset($_POST['tombol5'])) || (isset($_POST['kelas6'])&& isset($_POST['tombol6'])))
			{
				//Validasi dari set validasi (Create th_ajar otomatis)
				if($tanggal1!=$tanggal2){
					$model2=new ThAjar();
					$model2->th_ajar = date('Y').'/'.(date('Y')+1);
					$model2->save();
				}
				$valid=true;
				$input = array("A", "B", "C");
				
				if(isset($_POST['tombol1'])){
					$kelas=$_POST['kelas1'];
					$notif=1;
				}elseif(isset($_POST['tombol2'])){
					$kelas=$_POST['kelas2'];
					$notif=2;
				}elseif(isset($_POST['tombol3'])){
					$kelas=$_POST['kelas3'];
					$notif=3;
				}elseif(isset($_POST['tombol4'])){
					$kelas=$_POST['kelas4'];
					$notif=4;
				}elseif(isset($_POST['tombol5'])){
					$kelas=$_POST['kelas5'];
					$notif=5;
				}elseif(isset($_POST['tombol6'])){
					$kelas=$_POST['kelas6'];
					$notif=6;
				}
				
				foreach($kelas as $a=>$val)
				{
					$simpan=$this->loadModel($val);
					$model=$this->loadModel($val);
					$model->nis = $simpan->nis;
					$model->kelas = $simpan->kelas;
					$random=shuffle($input);
					$model->lokal=$input[0];
					$model->th_ajar = date('Y').'/'.(date('Y')+1);
					$valid=$model->validate()&&$valid;
					$model->save();
				}
				if($valid || $model -> save()){
					Yii::app()->user->setFlash('success', 'Proses random kelas '.$notif.' <strong>berhasil!</strong>. Terima kasih');
					$this->refresh();
					//$this->redirect(array('admin'));
				}
				/*$i=0;
				 $j=0;
				
				$number=array('A','B','C');
				shuffle($number);
				$kurang=count($_POST['kelas1']);
				while($i<=$kurang)
				{
					
				$model->lokal=$number[$j];
					
				if (($j+1) % 3 == 0) {
				shuffle($number);
				$j=-1;
				}
					
				$i++;
				$j++;
				}*/
					
				//var_dump($model->lokal);
				//die();
			}

		$this->render('admin',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Penempatan::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='penempatan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
