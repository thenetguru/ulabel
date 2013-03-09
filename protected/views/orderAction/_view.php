<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('orderStatusID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->orderStatus)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('action')); ?>:
	<?php echo GxHtml::encode($data->action); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('priority')); ?>:
	<?php echo GxHtml::encode($data->priority); ?>
	<br />

</div>