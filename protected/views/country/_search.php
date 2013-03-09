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
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'iso'); ?>
		<?php echo $form->textField($model, 'iso', array('maxlength' => 2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'priority'); ?>
		<?php echo $form->textField($model, 'priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'sticky'); ?>
		<?php echo $form->dropDownList($model, 'sticky', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'currencyID'); ?>
		<?php echo $form->dropDownList($model, 'currencyID', CHtml::listData(Currency::model()->concatenatedList, "id", "value"), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
