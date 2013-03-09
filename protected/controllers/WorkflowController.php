<?php

class WorkflowController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Workflow'),
		));
	}

	public function actionCreate() {
		$model = new Workflow;


		if (isset($_POST['Workflow'])) {
			$model->setAttributes($_POST['Workflow']);

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
		$model = $this->loadModel($id, 'Workflow');


		if (isset($_POST['Workflow'])) {
			$model->setAttributes($_POST['Workflow']);

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
			$this->loadModel($id, 'Workflow')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Workflow');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Workflow('search');
		$model->unsetAttributes();

		if (isset($_GET['Workflow']))
			$model->setAttributes($_GET['Workflow']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}