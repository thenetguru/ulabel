<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('companyID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->company)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('stockCount')); ?>:
	<?php echo GxHtml::encode($data->stockCount); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('transitCount')); ?>:
	<?php echo GxHtml::encode($data->transitCount); ?>
	<br />

</div>