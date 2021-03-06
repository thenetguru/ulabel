<?php

class LabelTypeController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'LabelType'),
		));
	}

	public function actionCreate() {
		$model = new LabelType;


		if (isset($_POST['LabelType'])) {
			$model->setAttributes($_POST['LabelType']);

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
		$model = $this->loadModel($id, 'LabelType');


		if (isset($_POST['LabelType'])) {
			$model->setAttributes($_POST['LabelType']);

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
			$this->loadModel($id, 'LabelType')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('LabelType');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new LabelType('search');
		$model->unsetAttributes();

		if (isset($_GET['LabelType']))
			$model->setAttributes($_GET['LabelType']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}