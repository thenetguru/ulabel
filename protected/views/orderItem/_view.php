<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('orderID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->order)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('labelID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->label)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('quantity')); ?>:
	<?php echo GxHtml::encode($data->quantity); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created')); ?>:
	<?php echo GxHtml::encode($data->created); ?>
	<br />

</div>