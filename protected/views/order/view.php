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
			'name' => 'src',
			'type' => 'raw',
			'value' => $model->src !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->src)), array('address/view', 'id' => GxActiveRecord::extractPkValue($model->src, true))) : null,
			),
array(
			'name' => 'dst',
			'type' => 'raw',
			'value' => $model->dst !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->dst)), array('address/view', 'id' => GxActiveRecord::extractPkValue($model->dst, true))) : null,
			),
array(
			'name' => 'orderStatus',
			'type' => 'raw',
			'value' => $model->orderStatus !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->orderStatus)), array('orderStatus/view', 'id' => GxActiveRecord::extractPkValue($model->orderStatus, true))) : null,
			),
array(
			'name' => 'user',
			'type' => 'raw',
			'value' => $model->user !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->user)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->user, true))) : null,
			),
array(
			'name' => 'deliveryAddress',
			'type' => 'raw',
			'value' => $model->deliveryAddress !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->deliveryAddress)), array('address/view', 'id' => GxActiveRecord::extractPkValue($model->deliveryAddress, true))) : null,
			),
array(
			'name' => 'invoiceAddress',
			'type' => 'raw',
			'value' => $model->invoiceAddress !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->invoiceAddress)), array('address/view', 'id' => GxActiveRecord::extractPkValue($model->invoiceAddress, true))) : null,
			),
'orderReference',
'purchaseOrder',
'quantity',
'required',
'created',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('orderItems')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->orderItems as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('orderItem/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>