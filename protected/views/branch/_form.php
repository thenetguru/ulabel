<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'branch-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'companyID'); ?>
		<?php echo $form->dropDownList($model, 'companyID', GxHtml::listDataEx(Company::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'companyID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 120)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'stockCount'); ?>
		<?php echo $form->textField($model, 'stockCount', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'stockCount'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'transitCount'); ?>
		<?php echo $form->textField($model, 'transitCount', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'transitCount'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('addresses')); ?></label>
		<?php echo $form->checkBoxList($model, 'addresses', GxHtml::encodeEx(GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('branchBranchTypes')); ?></label>
		<?php echo $form->checkBoxList($model, 'branchBranchTypes', GxHtml::encodeEx(GxHtml::listDataEx(BranchBranchType::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('branchTypes')); ?></label>
		<?php echo $form->checkBoxList($model, 'branchTypes', GxHtml::encodeEx(GxHtml::listDataEx(BranchType::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('users')); ?></label>
		<?php echo $form->checkBoxList($model, 'users', GxHtml::encodeEx(GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->