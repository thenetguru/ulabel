<?php

class ReportController extends GxController
{


  public function actionView($id)
  {
    $this->render('view', array(
      'model' => $this->loadModel($id, 'Report'),
    ));
  }

  public function actionCreate()
  {
    $model = new Report;


    if (isset($_POST['Report'])) {
      $model->setAttributes($_POST['Report']);

      if ($model->save()) {
        if (Yii::app()->getRequest()->getIsAjaxRequest())
          Yii::app()->end();
        else
          $this->redirect(array('view', 'id' => $model->id));
      }
    }

    $this->render('create', array('model' => $model));
  }

  public function actionUpdate($id)
  {
    $model = $this->loadModel($id, 'Report');


    if (isset($_POST['Report'])) {
      $model->setAttributes($_POST['Report']);

      if ($model->save()) {
        $this->redirect(array('view', 'id' => $model->id));
      }
    }

    $this->render('update', array(
      'model' => $model,
    ));
  }

  public function actionDelete($id)
  {
    if (Yii::app()->getRequest()->getIsPostRequest()) {
      $this->loadModel($id, 'Report')->delete();

      if (!Yii::app()->getRequest()->getIsAjaxRequest())
        $this->redirect(array('admin'));
    } else
      throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
  }

  public function actionIndex()
  {
    $dataProvider = new CActiveDataProvider('Report');
    $this->render('index', array(
      'dataProvider' => $dataProvider,
    ));
  }

  public function actionAdmin()
  {
    $model = new Report('search');
    $model->unsetAttributes();

    if (isset($_GET['Report']))
      $model->setAttributes($_GET['Report']);

    $this->render('admin', array(
      'model' => $model,
    ));
  }

  /**
   * Generate a report based on a defined criteria
   * @soap
   */
  public function actionGenerate($criteria = null)
  {

  }
}