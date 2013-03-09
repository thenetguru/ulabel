<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'currency-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'character'); ?>
		<?php echo $form->textField($model, 'character', array('maxlength' => 3)); ?>
		<?php echo $form->error($model,'character'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'iso'); ?>
		<?php echo $form->textField($model, 'iso', array('maxlength' => 3)); ?>
		<?php echo $form->error($model,'iso'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('countries')); ?></label>
		<?php echo $form->checkBoxList($model, 'countries', GxHtml::encodeEx(GxHtml::listDataEx(Country::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->