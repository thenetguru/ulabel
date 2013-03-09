<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('length')); ?>:
	<?php echo GxHtml::encode($data->length); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('priority')); ?>:
	<?php echo GxHtml::encode($data->priority); ?>
	<br />

</div>