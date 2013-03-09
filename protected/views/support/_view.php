<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('supportTypeID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->supportType)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('supportPriorityID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->supportPriority)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('subject')); ?>:
	<?php echo GxHtml::encode($data->subject); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created')); ?>:
	<?php echo GxHtml::encode($data->created); ?>
	<br />

</div>