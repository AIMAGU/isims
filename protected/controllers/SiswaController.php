<?php

class SiswaController extends Controller
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
		/*$model=new Siswa;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Siswa']))
		{
			$model->attributes=$_POST['Siswa'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->nis));
		}

		$this->render('create',array(
			'model'=>$model,
		));*/
		$model=new Siswa;
		$model2=new Keluarga;
		$model3=new Ayah;
		$model4=new Ibu;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Siswa']))
		{
			$model3->attributes=$_POST['Ayah'];
			$model4->attributes=$_POST['Ibu'];
		
			$model2->attributes=$_POST['Keluarga'];
			$model2->nik_ayah=($_POST['Ayah']['nik_ayah']);
			$model2->nik_ibu=($_POST['Ibu']['nik_ibu']);
		
			$model->attributes=$_POST['Siswa'];
			$model->no_kk=($_POST['Keluarga']['no_kk']);
				
			$valid=$model->validate();
			$valid=$model2->validate() && $valid;
			$valid=$model3->validate() && $valid;
			$valid=$model4->validate() && $valid;
				
			$savefoto;
				
			if(strlen(trim(CUploadedFile::getInstance($model,'foto'))) > 0)
			{
				$savefoto=CUploadedFile::getInstance($model,'foto');
				$model->foto='isims-'.$model->nis.'.'.$savefoto->extensionName;
			}
		
			if($valid)
			{
				if($model3->save() && $model4->save()){
					if($model2->save()){
						if($model->save())
						{
							if(strlen(trim($model->foto)) > 0)
							{
								$savefoto->saveAs(Yii::app()->basePath . '/../images/siswa/' . $model->foto);
							}
							$this->redirect(array('view','id'=>$model->nis));
						}
					}
				}
			}
		}
		
		$this->render('create',array(
				'model'=>$model,
				'model2'=>$model2,
				'model3'=>$model3,
				'model4'=>$model4,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		/*$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Siswa']))
		{
			$model->attributes=$_POST['Siswa'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->nis));
		}

		$this->render('update',array(
			'model'=>$model,
		));*/
		$model=$this->loadModel($id);
		
		$model2=Keluarga::model()->findByPk($model->no_kk);
		
		$model3=Ayah::model()->findByPk($model2->nik_ayah);
		
		$model4=Ibu::model()->findByPk($model2->nik_ibu);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Siswa']))
		{
			$model4->attributes=$_POST['Ibu'];
			$model3->attributes=$_POST['Ayah'];
			$model2->attributes=$_POST['Keluarga'];
			$model->attributes=$_POST['Siswa'];
				
			$valid=$model->validate();
			$valid=$model4->validate() && $valid;
			$valid=$model3->validate() && $valid;
			$valid=$model2->validate() && $valid;
				
			if($valid)
			{
				$model4->save();
				$model3->save();
				$model2->save();
				if($model->save())
					$this->redirect(array('view','id'=>$model->nis));
			}
				
		}
		
		$this->render('update',array(
				'model'=>$model,
				'model2'=>$model2,
				'model3'=>$model3,
				'model4'=>$model4,
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
		$dataProvider=new CActiveDataProvider('Siswa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Siswa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Siswa']))
			$model->attributes=$_GET['Siswa'];

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
		$model=Siswa::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='siswa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
