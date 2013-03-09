<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'fname'); ?>
		<?php echo $form->textField($model, 'fname', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'fname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lname'); ?>
		<?php echo $form->textField($model, 'lname', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'lname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'pword'); ?>
		<?php echo $form->textField($model, 'pword', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'pword'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'canForceDelivery'); ?>
		<?php echo $form->checkBox($model, 'canForceDelivery'); ?>
		<?php echo $form->error($model,'canForceDelivery'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkBox($model, 'active'); ?>
		<?php echo $form->error($model,'active'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('orders')); ?></label>
		<?php echo $form->checkBoxList($model, 'orders', GxHtml::encodeEx(GxHtml::listDataEx(Order::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('supportMessages')); ?></label>
		<?php echo $form->checkBoxList($model, 'supportMessages', GxHtml::encodeEx(GxHtml::listDataEx(SupportMessage::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('ulBranches')); ?></label>
		<?php echo $form->checkBoxList($model, 'ulBranches', GxHtml::encodeEx(GxHtml::listDataEx(Branch::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('ulBranchBranchTypes')); ?></label>
		<?php echo $form->checkBoxList($model, 'ulBranchBranchTypes', GxHtml::encodeEx(GxHtml::listDataEx(BranchBranchType::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->