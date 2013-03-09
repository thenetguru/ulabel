<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'order-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'srcID'); ?>
		<?php echo $form->dropDownList($model, 'srcID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'srcID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'dstID'); ?>
		<?php echo $form->dropDownList($model, 'dstID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'dstID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'orderStatusID'); ?>
		<?php echo $form->dropDownList($model, 'orderStatusID', GxHtml::listDataEx(OrderStatus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'orderStatusID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'userID'); ?>
		<?php echo $form->dropDownList($model, 'userID', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'userID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'deliveryAddressID'); ?>
		<?php echo $form->dropDownList($model, 'deliveryAddressID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'deliveryAddressID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'invoiceAddressID'); ?>
		<?php echo $form->dropDownList($model, 'invoiceAddressID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'invoiceAddressID'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'orderReference'); ?>
		<?php echo $form->textField($model, 'orderReference', array('maxlength' => 40)); ?>
		<?php echo $form->error($model,'orderReference'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'purchaseOrder'); ?>
		<?php echo $form->textField($model, 'purchaseOrder', array('maxlength' => 40)); ?>
		<?php echo $form->error($model,'purchaseOrder'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model, 'quantity'); ?>
		<?php echo $form->error($model,'quantity'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'required'); ?>
		<?php echo $form->textField($model, 'required'); ?>
		<?php echo $form->error($model,'required'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
		<?php echo $form->error($model,'created'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('orderItems')); ?></label>
		<?php echo $form->checkBoxList($model, 'orderItems', GxHtml::encodeEx(GxHtml::listDataEx(OrderItem::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->