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
	$.fn.yiiGridView.update('company-grid', {
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
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php
$this->widget("bootstrap.widgets.TbExtendedGridView", array(
	"id" => "company-grid",
	"dataProvider" => $model->search(),
  "type" => "striped bordered condensed",
  "fixedHeader" => true,
	"filter" => $model,
	"columns" => array(
		array(
      "class" => "bootstrap.widgets.TbJEditableColumn",
      "name"=>"name",
      "header" => "Company Name",
      "jEditableOptions" => array(
        "type" => "text",
        "submitdata" => array("attribute" => "name"),
        "cssclass" => "form",
        "width" => "200px"
      )
    ),
		array(
      "class"=>"bootstrap.widgets.TbButtonColumn",
      "htmlOptions"=>array("style"=>"width: 50px"),
		),
	),
));
?>