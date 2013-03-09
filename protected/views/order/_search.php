<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'srcID'); ?>
		<?php echo $form->dropDownList($model, 'srcID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'dstID'); ?>
		<?php echo $form->dropDownList($model, 'dstID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'orderStatusID'); ?>
		<?php echo $form->dropDownList($model, 'orderStatusID', GxHtml::listDataEx(OrderStatus::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'userID'); ?>
		<?php echo $form->dropDownList($model, 'userID', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'deliveryAddressID'); ?>
		<?php echo $form->dropDownList($model, 'deliveryAddressID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'invoiceAddressID'); ?>
		<?php echo $form->dropDownList($model, 'invoiceAddressID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'orderReference'); ?>
		<?php echo $form->textField($model, 'orderReference', array('maxlength' => 40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'purchaseOrder'); ?>
		<?php echo $form->textField($model, 'purchaseOrder', array('maxlength' => 40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'quantity'); ?>
		<?php echo $form->textField($model, 'quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'required'); ?>
		<?php echo $form->textField($model, 'required'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
