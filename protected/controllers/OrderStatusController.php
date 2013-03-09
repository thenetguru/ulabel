<?php

class OrderStatusController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'OrderStatus'),
		));
	}

	public function actionCreate() {
		$model = new OrderStatus;


		if (isset($_POST['OrderStatus'])) {
			$model->setAttributes($_POST['OrderStatus']);

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
		$model = $this->loadModel($id, 'OrderStatus');


		if (isset($_POST['OrderStatus'])) {
			$model->setAttributes($_POST['OrderStatus']);

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
			$this->loadModel($id, 'OrderStatus')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('OrderStatus');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new OrderStatus('search');
		$model->unsetAttributes();

		if (isset($_GET['OrderStatus']))
			$model->setAttributes($_GET['OrderStatus']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}