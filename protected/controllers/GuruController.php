<?php

class GuruController extends Controller
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
		$model=new Guru;
		$model2=new User;
		$model3=new Kabupaten;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Guru']))
		{
			$model->attributes=$_POST['Guru'];
			$model2->attributes=$_POST['User'];
			$model2->kode_guru=$_POST['Guru']['kode_guru'];
			$model2->password=md5('isims'.$_POST['User']['password']);
			$model2->id=$_POST['Guru']['kode_guru'];
			
			$savefoto;
				
			if(strlen(trim(CUploadedFile::getInstance($model,'foto'))) > 0)
			{
				$savefoto=CUploadedFile::getInstance($model,'foto');
				try {
					if(($savefoto->extensionName)=='png' || ($savefoto->extensionName)=='jpg' || ($savefoto->extensionName)=='jpeg'){
						$val=1;
						$model->foto='isims-'.$model->nip.'.'.$savefoto->extensionName;
					}else{
						$val=0;
						if(($_POST['Guru']['jk'])=='L'){
							$model->foto='isims-default-male.png';
						}else{
							$model->foto='isims-default-female.png';
						}
						Yii::app()->user->setFlash('warning', 'Foto diset Default karena ekstensi anda bukan png/jpg/jpeg.');
					}
				}
				catch(CDbException $e) {
					Yii::app()->user->setFlash('warning', 'Foto anda salah. Ekstensi harus png/jpg/jpeg.');
					$model->addError(null, "Foto anda salah. Ekstensi harus png/jpg/jpeg."/*$e->getMessage()*/);
				}
			}else{
				$val=0;
				if(($_POST['Guru']['jk'])=='L'){
					$model->foto='isims-default-male.png';
				}else{
					$model->foto='isims-default-female.png';
				}
			}
			
			$valid=$model->validate();
			$valid=$model2->validate() && $valid;
			
			if($valid)
			{
				if($model->save() && $model2->save()){
					if(strlen(trim($model->foto)) > 0 && ($val==1))
					{
						if(($savefoto->extensionName)=='png' || ($savefoto->extensionName)=='jpg' || ($savefoto->extensionName)=='jpeg'){
							$savefoto->saveAs(Yii::app()->basePath . '/../images/' . $model->foto);
							Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> ditambahkan. Terima kasih');
						}
					}else{
						Yii::app()->user->setFlash('info', 'Data <strong>berhasil</strong> ditambahkan tanpa ada foto. Terima kasih');
					}
					$this->redirect(array('admin'));
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
			'model3'=>$model3,
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
		$model2=User::model()->findByPk($model->kode_guru);
		$model3=Kabupaten::model()->findByPk($model->idkec);
		
		if(isset($_POST['Guru']))
		{
			$model->attributes=$_POST['Guru'];
			
			if(md5('isims'.$_POST['User']['password'])===$model2->password){
				$model2->setScenario('changePassword');
				$model2->attributes=$_POST['User'];
				$model2->password=md5('isims'.$_POST['User']['password']);
			}
			
			$savefoto;
			
			if(strlen(trim(CUploadedFile::getInstance($model,'foto'))) > 0)
			{
				$savefoto=CUploadedFile::getInstance($model,'foto');
				try {
					if(($savefoto->extensionName)=='png' || ($savefoto->extensionName)=='jpg' || ($savefoto->extensionName)=='jpeg'){
						$val=1;
						$model->foto='isims-'.$model->nip.'.'.$savefoto->extensionName;
					}else{
						$val=0;
						Yii::app()->user->setFlash('warning', 'Foto diset Default karena ekstensi anda bukan png/jpg/jpeg.');
					}
				}
				catch(CDbException $e) {
					Yii::app()->user->setFlash('warning', 'Foto anda salah. Ekstensi harus png/jpg/jpeg.');
					$model->addError(null, "Foto anda salah. Ekstensi harus png/jpg/jpeg."/*$e->getMessage()*/);
				}
			}else{
				$val=0;
			}
			
			$valid=$model->validate();
			$valid=$model2->validate() && $valid;
			
			if($valid)
			{
				if(strlen(trim($model->foto)) > 0 && ($val==1))
				{
					if(($savefoto->extensionName)=='png' || ($savefoto->extensionName)=='jpg' || ($savefoto->extensionName)=='jpeg'){
						$savefoto->saveAs(Yii::app()->basePath . '/../images/' . $model->foto);
						Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> diperbarui. Terima kasih');
					}
				}
				
				if(md5('isims'.$_POST['User']['password'])===$model2->password){
					$model->save();
					$model2->save();
					Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> diperbarui. Terima kasih');
					$this->redirect(array('view','id'=>$model->kode_guru));
				}else{
					$model->addError(null, "Silahkan masukan password anda!"/*$e->getMessage()*/);
					Yii::app()->user->setFlash('error', 'Silahkan masukan password anda!');
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model2'=>$model2,
			'model3'=>$model3,
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
			$model=$this->loadModel($id);
			$model2=User::model()->findByPk($model->kode_guru);
			if(($model->foto)=='isims-default-male.png' || ($model->foto)=='isims-default-female.png'){
				Yii::app()->user->setFlash('warning', 'Foto tidak ada.');
			}else{
				$foto=(Yii::app()->basePath . '/../images/' . $model->foto);
				unlink($foto);
				Yii::app()->user->setFlash('warning', 'Foto berhasil dihapus.');
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if ($model2->delete()) {
				if ($model->delete()) {
					Yii::app()->user->setFlash('success', 'Data <strong>berhasil</strong> dihapus. Terima kasih');
					$this->redirect(array('admin'));
				}
			}
			else
				throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Guru');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Guru('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Guru']))
			$model->attributes=$_GET['Guru'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Guru::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='guru-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
