<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'address-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'branchID'); ?>
		<?php echo $form->dropDownList($model, 'branchID', GxHtml::listDataEx(Branch::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'branchID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'line1'); ?>
		<?php echo $form->textField($model, 'line1', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'line1'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'line2'); ?>
		<?php echo $form->textField($model, 'line2', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'line2'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'line3'); ?>
		<?php echo $form->textField($model, 'line3', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'line3'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'line4'); ?>
		<?php echo $form->textField($model, 'line4', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'line4'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'postcode'); ?>
		<?php echo $form->textField($model, 'postcode', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'postcode'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model, 'telephone', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'telephone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model, 'fax', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'fax'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'countryID'); ?>
		<?php echo $form->dropDownList($model, 'countryID', GxHtml::listDataEx(Country::model()->findAllAttributes(null, true)), array("prompt"=>"")); ?>
		<?php echo $form->error($model,'countryID'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('labels')); ?></label>
		<?php echo $form->checkBoxList($model, 'labels', GxHtml::encodeEx(GxHtml::listDataEx(Label::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('labels1')); ?></label>
		<?php echo $form->checkBoxList($model, 'labels1', GxHtml::encodeEx(GxHtml::listDataEx(Label::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('orders')); ?></label>
		<?php echo $form->checkBoxList($model, 'orders', GxHtml::encodeEx(GxHtml::listDataEx(Order::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('orders1')); ?></label>
		<?php echo $form->checkBoxList($model, 'orders1', GxHtml::encodeEx(GxHtml::listDataEx(Order::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('orders2')); ?></label>
		<?php echo $form->checkBoxList($model, 'orders2', GxHtml::encodeEx(GxHtml::listDataEx(Order::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('orders3')); ?></label>
		<?php echo $form->checkBoxList($model, 'orders3', GxHtml::encodeEx(GxHtml::listDataEx(Order::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->