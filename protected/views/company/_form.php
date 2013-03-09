<div class="form">

  <?php $form = $this->beginWidget("bootstrap.widgets.TbActiveForm", array(
    "id" => 'company-form',
    "enableAjaxValidation" => false,
    "type" => "horizontal"
  ));
  ?>

  <?php echo $form->errorSummary($model); ?>

  <?php echo $form->textFieldRow($model, "name") ?>

  <fieldset>
    <legend><?php echo Yii::t("app", "Branches", array(":1" => $model->name)) ?>
      <?php $this->widget("bootstrap.widgets.TbButton", array("label" => "Add Branch", "icon" => "plus white", "size" => "small", "type" => "success", "buttonType" => "link", "url" => $this->createUrl("branch/create"), "htmlOptions" => array("class" => "pull-right"))) ?>
    </legend>

    <?php $this->widget("bootstrap.widgets.TbExtendedGridView", array(
      "id" => "branch-grid",
      "dataProvider" => $branch,
      "template" => "{items}",
      "hideHeader" => true,
      "type" => "striped",
      "columns" => array(
        array(
          "name" => "name",
          "header" => "Branch name"
        ),
        array(
          "name" => "stockCount",
          "htmlOptions" => array("style" => "width: 100px")
        ),
        array(
          "name" => "transitCount",
          "htmlOptions" => array("style" => "width: 100px")
        ),
        array(
          "class" => "bootstrap.widgets.TbButtonColumn",
          "htmlOptions" => array("style" => "width: 50px"),
          "viewButtonUrl"=>'Yii::app()->createUrl("branch/view", array("id"=>$data->id))',
          "updateButtonUrl"=>'Yii::app()->createUrl("branch/update", array("id"=>$data->id))',
          "deleteButtonUrl"=>'Yii::app()->createUrl("branch/delete", array("id"=>$data->id))',
        ),
      ),
    )); ?>

  </fieldset>

  <div class="form-actions">
    <?php $this->widget("bootstrap.widgets.TbButton", array("label" => "Update Company", "buttonType" => "submit", "type" => "primary")); ?>
    <?php $this->widget("bootstrap.widgets.TbButton", array("label" => "Cancel", "buttonType" => "link", "url" => $this->createUrl("company/admin"))) ?>
  </div>

  <?php $this->endWidget(); ?>
</div>