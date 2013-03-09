<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('order-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'order-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		array(
				'name'=>'srcID',
				'value'=>'GxHtml::valueEx($data->src)',
				'filter'=>GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'dstID',
				'value'=>'GxHtml::valueEx($data->dst)',
				'filter'=>GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'orderStatusID',
				'value'=>'GxHtml::valueEx($data->orderStatus)',
				'filter'=>GxHtml::listDataEx(OrderStatus::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'userID',
				'value'=>'GxHtml::valueEx($data->user)',
				'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'deliveryAddressID',
				'value'=>'GxHtml::valueEx($data->deliveryAddress)',
				'filter'=>GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)),
				),
		/*
		array(
				'name'=>'invoiceAddressID',
				'value'=>'GxHtml::valueEx($data->invoiceAddress)',
				'filter'=>GxHtml::listDataEx(Address::model()->findAllAttributes(null, true)),
				),
		'orderReference',
		'purchaseOrder',
		'quantity',
		'required',
		'created',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>