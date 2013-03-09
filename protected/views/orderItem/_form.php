<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'order-item-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'orderID'); ?>
		<?php echo $form->dropDownList($model, 'orderID', GxHtml::listDataEx(Order::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'orderID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'labelID'); ?>
		<?php echo $form->dropDownList($model, 'labelID', GxHtml::listDataEx(Label::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'labelID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model, 'quantity'); ?>
		<?php echo $form->error($model,'quantity'); ?>
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