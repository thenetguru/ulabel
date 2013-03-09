<?php

class OrderActionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'OrderAction'),
		));
	}

	public function actionCreate() {
		$model = new OrderAction;


		if (isset($_POST['OrderAction'])) {
			$model->setAttributes($_POST['OrderAction']);

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
		$model = $this->loadModel($id, 'OrderAction');


		if (isset($_POST['OrderAction'])) {
			$model->setAttributes($_POST['OrderAction']);

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
			$this->loadModel($id, 'OrderAction')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('OrderAction');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new OrderAction('search');
		$model->unsetAttributes();

		if (isset($_GET['OrderAction']))
			$model->setAttributes($_GET['OrderAction']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}