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
		<?php echo $form->label($model, 'labelTypeID'); ?>
		<?php echo $form->dropDownList($model, 'labelTypeID', GxHtml::listDataEx(LabelType::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'parentID'); ?>
		<?php echo $form->dropDownList($model, 'parentID', GxHtml::listDataEx(Label::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'number'); ?>
		<?php echo $form->textField($model, 'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'history'); ?>
		<?php echo $form->textArea($model, 'history'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'currentAddressID'); ?>
		<?php echo $form->dropDownList($model, 'currentAddressID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'destinationAddressID'); ?>
		<?php echo $form->dropDownList($model, 'destinationAddressID', GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'requiredDate'); ?>
		<?php echo $form->textField($model, 'requiredDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'dispatchDate'); ?>
		<?php echo $form->textField($model, 'dispatchDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'arrivalDate'); ?>
		<?php echo $form->textField($model, 'arrivalDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
