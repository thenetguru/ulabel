<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'country-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'iso'); ?>
		<?php echo $form->textField($model, 'iso', array('maxlength' => 2)); ?>
		<?php echo $form->error($model,'iso'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'priority'); ?>
		<?php echo $form->textField($model, 'priority'); ?>
		<?php echo $form->error($model,'priority'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sticky'); ?>
		<?php echo $form->checkBox($model, 'sticky'); ?>
		<?php echo $form->error($model,'sticky'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'currencyID'); ?>
		<?php echo $form->dropDownList($model, 'currencyID', GxHtml::listDataEx(Currency::model()->concatenatedList)); ?>
		<?php echo $form->error($model,'currencyID'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('addresses')); ?></label>
		<?php echo $form->checkBoxList($model, 'addresses', GxHtml::encodeEx(GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->