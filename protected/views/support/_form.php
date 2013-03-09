<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'support-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'supportTypeID'); ?>
		<?php echo $form->dropDownList($model, 'supportTypeID', GxHtml::listDataEx(SupportType::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'supportTypeID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'supportPriorityID'); ?>
		<?php echo $form->dropDownList($model, 'supportPriorityID', GxHtml::listDataEx(SupportPriority::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'supportPriorityID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model, 'subject', array('maxlength' => 40)); ?>
		<?php echo $form->error($model,'subject'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
		<?php echo $form->error($model,'created'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('supportMessages')); ?></label>
		<?php echo $form->checkBoxList($model, 'supportMessages', GxHtml::encodeEx(GxHtml::listDataEx(SupportMessage::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->