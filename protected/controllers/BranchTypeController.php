<?php

class BranchTypeController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BranchType'),
		));
	}

	public function actionCreate() {
		$model = new BranchType;


		if (isset($_POST['BranchType'])) {
			$model->setAttributes($_POST['BranchType']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BranchType');


		if (isset($_POST['BranchType'])) {
			$model->setAttributes($_POST['BranchType']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'BranchType')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BranchType');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BranchType('search');
		$model->unsetAttributes();

		if (isset($_GET['BranchType']))
			$model->setAttributes($_GET['BranchType']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}