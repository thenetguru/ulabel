<?php

class OrderItemController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'OrderItem'),
		));
	}

	public function actionCreate() {
		$model = new OrderItem;


		if (isset($_POST['OrderItem'])) {
			$model->setAttributes($_POST['OrderItem']);

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
		$model = $this->loadModel($id, 'OrderItem');


		if (isset($_POST['OrderItem'])) {
			$model->setAttributes($_POST['OrderItem']);

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
			$this->loadModel($id, 'OrderItem')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('OrderItem');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new OrderItem('search');
		$model->unsetAttributes();

		if (isset($_GET['OrderItem']))
			$model->setAttributes($_GET['OrderItem']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}