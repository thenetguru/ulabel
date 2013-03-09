<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('character')); ?>:
	<?php echo GxHtml::encode($data->character); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('iso')); ?>:
	<?php echo GxHtml::encode($data->iso); ?>
	<br />

</div>