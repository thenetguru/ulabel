<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'order-action-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'orderStatusID'); ?>
		<?php echo $form->dropDownList($model, 'orderStatusID', GxHtml::listDataEx(OrderStatus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'orderStatusID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model, 'action', array('maxlength' => 40)); ?>
		<?php echo $form->error($model,'action'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'priority'); ?>
		<?php echo $form->textField($model, 'priority'); ?>
		<?php echo $form->error($model,'priority'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->