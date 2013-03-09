<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('iso')); ?>:
	<?php echo GxHtml::encode($data->iso); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('priority')); ?>:
	<?php echo GxHtml::encode($data->priority); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sticky')); ?>:
	<?php echo GxHtml::encode($data->sticky); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('currencyID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->currency)); ?>
	<br />

</div>