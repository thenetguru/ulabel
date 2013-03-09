<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'workflow-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'branchTypeID'); ?>
		<?php echo $form->dropDownList($model, 'branchTypeID', GxHtml::listDataEx(BranchType::model()->findAllAttributes(null, true)), array("prompt"=>"")); ?>
		<?php echo $form->error($model,'branchTypeID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nextBranchTypeID'); ?>
		<?php echo $form->dropDownList($model, 'nextBranchTypeID', GxHtml::listDataEx(BranchType::model()->findAllAttributes(null, true)), array("prompt"=>"")); ?>
		<?php echo $form->error($model,'nextBranchTypeID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkBox($model, 'active'); ?>
		<?php echo $form->error($model,'active'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->