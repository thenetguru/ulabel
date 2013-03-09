<?php

class BranchController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Branch'),
		));
	}

	public function actionCreate() {
		$model = new Branch;


		if (isset($_POST['Branch'])) {
			$model->setAttributes($_POST['Branch']);
			$relatedData = array(
				'branchTypes' => $_POST['Branch']['branchTypes'] === '' ? null : $_POST['Branch']['branchTypes'],
				'users' => $_POST['Branch']['users'] === '' ? null : $_POST['Branch']['users'],
				);

			if ($model->saveWithRelated($relatedData)) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Branch');


		if (isset($_POST['Branch'])) {
			$model->setAttributes($_POST['Branch']);
			$relatedData = array(
				'branchTypes' => $_POST['Branch']['branchTypes'] === '' ? null : $_POST['Branch']['branchTypes'],
				'users' => $_POST['Branch']['users'] === '' ? null : $_POST['Branch']['users'],
				);

			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Branch')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Branch');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Branch('search');
		$model->unsetAttributes();

		if (isset($_GET['Branch']))
			$model->setAttributes($_GET['Branch']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}