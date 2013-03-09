<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'label-type-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'length'); ?>
		<?php echo $form->textField($model, 'length'); ?>
		<?php echo $form->error($model,'length'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'priority'); ?>
		<?php echo $form->textField($model, 'priority'); ?>
		<?php echo $form->error($model,'priority'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('labels')); ?></label>
		<?php echo $form->checkBoxList($model, 'labels', GxHtml::encodeEx(GxHtml::listDataEx(Label::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->