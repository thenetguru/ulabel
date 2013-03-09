<?php
/**
 * @var TbActiveForm $form
 */
?>
<div class="form">


  <?php $form = $this->beginWidget("bootstrap.widgets.TbActiveForm", array(
    "id" => "label-form",
    "enableAjaxValidation" => false,
    "type" => "horizontal"

  ));
  ?>

  <p class="note">
    <?php echo Yii::t('app', 'Fields with'); ?> <span
      class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
  </p>

  <fieldset>
    <legend><?php echo "Label Details" ?></legend>
    <?php echo $form->errorSummary($model); ?>
    <div class="control-group">
      <label class="control-label" for="Label_labelTypeID">Label Type</label>
      <div class="controls">
        <select id="Label_labelTypeID" name="Label[labelTypeID]" class="span4">
          <?php
          echo GxHtml::tag("option", array(), "");
          foreach (LabelType::model()->findAll() as $n => $v)
            echo GxHtml::tag("option", array(
              "value" => $v->id,
              "data-id"=>$v->id,
              "data-maxChildren"=>$v->maxChildren,
              "data-parent"=>$v->parentID,
              "data-length"=>$v->length,
              "data-parentLength"=>(isset($v->parent))?$v->parent->length:"0"
            ), $v->name);
          ?>
        </select>
      </div>
    </div>
    <?php echo $form->textFieldRow($model, "parentID", array("prepend"=>"<i class=\"icon-tag\"></i>", "class"=>"span12", "style"=>"text-align: right; font-family: Courier", "maxlength"=>14)); ?>
    <?php echo $form->checkBoxRow($model, "createParent", array("hint"=>Yii::t("app", "<strong>Note:</strong> Select to create the parent label if it doesn't already exist"))); ?>
    <?php echo $form->textFieldRow($model, "number"); ?>
  </fieldset>

  <div class="form-actions">
    <?php $this->widget("bootstrap.widgets.TbButton", array("label" => "Save Label(s)", "buttonType"=>"submit", "type" => "primary")); ?>
  </div>
</div>
<!-- row -->

<?php
$this->endWidget();
?>
</div><!-- form -->

<script>
  $(function () {
    $(document).on("change", "select#Label_labelTypeID", function () {
      if(typeof $(this).children(":selected").data("parent") !== "undefined") {
        console.log("This has a parent");
      }
    });
  });
</script>