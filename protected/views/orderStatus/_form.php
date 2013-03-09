<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'order-status-form',
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('orders')); ?></label>
		<?php echo $form->checkBoxList($model, 'orders', GxHtml::encodeEx(GxHtml::listDataEx(Order::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('orderActions')); ?></label>
		<?php echo $form->checkBoxList($model, 'orderActions', GxHtml::encodeEx(GxHtml::listDataEx(OrderAction::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('orderFlows')); ?></label>
		<?php echo $form->checkBoxList($model, 'orderFlows', GxHtml::encodeEx(GxHtml::listDataEx(OrderFlow::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('orderFlows1')); ?></label>
		<?php echo $form->checkBoxList($model, 'orderFlows1', GxHtml::encodeEx(GxHtml::listDataEx(OrderFlow::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->