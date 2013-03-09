<?php

class LabelController extends GxController {

  /**
   * SOAP declarative
   */
  public function actions() {
    return array(
      "api" => array(
        "class" => "CWebServiceAction",
        "classMap" => array(
          "labels" => "Label"
        )
      )
    );
  }

  public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Label'),
		));
	}

	public function actionCreate() {
		$model = new Label;


		if (isset($_POST['Label'])) {
			$model->setAttributes($_POST['Label']);

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
		$model = $this->loadModel($id, 'Label');


		if (isset($_POST['Label'])) {
			$model->setAttributes($_POST['Label']);

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
			$this->loadModel($id, 'Label')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Label');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Label('search');
		$model->unsetAttributes();

		if (isset($_GET['Label']))
			$model->setAttributes($_GET['Label']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

  /**
   * @soap
   */
  public function getStock() {

  }
}