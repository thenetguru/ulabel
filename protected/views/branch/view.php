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
			'name' => 'company',
			'type' => 'raw',
			'value' => $model->company !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->company)), array('company/view', 'id' => GxActiveRecord::extractPkValue($model->company, true))) : null,
			),
'name',
'stockCount',
'transitCount',
	),
)); ?>

  <h2><?php echo GxHtml::encode($model->getRelationLabel('branchTypes')); ?></h2>
<?php
echo GxHtml::openTag('ul');
foreach($model->branchTypes as $relatedModel) {
  echo GxHtml::openTag('li');
  echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('branchType/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));

  echo GxHtml::openTag("dl");

  echo GxHtml::tag("dt", array(), "Delivery Address");
  echo GxHtml::tag("dd", array(), $relatedModel->deliveryAddress?$relatedModel->deliveryAddress->line1:"<i>No delivery addresses assigned</i>");

  echo GxHtml::closeTag("dl");

  echo GxHtml::openTag("dl");

  echo GxHtml::tag("dt", array(), "Invoice Address");
  echo GxHtml::tag("dd", array(), $relatedModel->invoiceAddress?$relatedModel->invoiceAddress->line1:"<i>No invoice addresses assigned</i>");

  echo GxHtml::closeTag("dl");

  echo GxHtml::tag("hr");

  echo GxHtml::tag("h4", array(), "Users on this branch type");

  foreach($relatedModel->branchBranchType->users as $user)
    echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($user)), array('user/view', 'id' => GxActiveRecord::extractPkValue($user, true))) . "<br/>";

  echo GxHtml::tag("hr");

  echo GxHtml::closeTag('li');
}
echo GxHtml::closeTag('ul');
?>