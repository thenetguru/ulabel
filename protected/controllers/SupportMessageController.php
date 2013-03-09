<?php

class SupportMessageController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'SupportMessage'),
		));
	}

	public function actionCreate() {
		$model = new SupportMessage;


		if (isset($_POST['SupportMessage'])) {
			$model->setAttributes($_POST['SupportMessage']);

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
		$model = $this->loadModel($id, 'SupportMessage');


		if (isset($_POST['SupportMessage'])) {
			$model->setAttributes($_POST['SupportMessage']);

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
			$this->loadModel($id, 'SupportMessage')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('SupportMessage');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new SupportMessage('search');
		$model->unsetAttributes();

		if (isset($_GET['SupportMessage']))
			$model->setAttributes($_GET['SupportMessage']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}