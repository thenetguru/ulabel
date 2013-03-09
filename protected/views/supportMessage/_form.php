<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'support-message-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'supportID'); ?>
		<?php echo $form->dropDownList($model, 'supportID', GxHtml::listDataEx(Support::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'supportID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'userID'); ?>
		<?php echo $form->textField($model, 'userID'); ?>
		<?php echo $form->error($model,'userID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model, 'content'); ?>
		<?php echo $form->error($model,'content'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
		<?php echo $form->error($model,'created'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->