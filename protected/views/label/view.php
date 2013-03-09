<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'labelType',
			'type' => 'raw',
			'value' => $model->labelType !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->labelType)), array('labelType/view', 'id' => GxActiveRecord::extractPkValue($model->labelType, true))) : null,
			),
array(
			'name' => 'parent',
			'type' => 'raw',
			'value' => $model->parent !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->parent)), array('label/view', 'id' => GxActiveRecord::extractPkValue($model->parent, true))) : null,
			),
'number',
'history',
array(
			'name' => 'currentAddress',
			'type' => 'raw',
			'value' => $model->currentAddress !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->currentAddress)), array('address/view', 'id' => GxActiveRecord::extractPkValue($model->currentAddress, true))) : null,
			),
array(
			'name' => 'destinationAddress',
			'type' => 'raw',
			'value' => $model->destinationAddress !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->destinationAddress)), array('address/view', 'id' => GxActiveRecord::extractPkValue($model->destinationAddress, true))) : null,
			),
'requiredDate',
'dispatchDate',
'arrivalDate',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('labels')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->labels as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('label/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('orderItems')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->orderItems as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('orderItem/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>