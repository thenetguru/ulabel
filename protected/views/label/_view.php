<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('labelTypeID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->labelType)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('parentID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->parent)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('number')); ?>:
	<?php echo GxHtml::encode($data->number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('history')); ?>:
	<?php echo GxHtml::encode($data->history); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('currentAddressID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->currentAddress)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('destinationAddressID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->destinationAddress)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('requiredDate')); ?>:
	<?php echo GxHtml::encode($data->requiredDate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dispatchDate')); ?>:
	<?php echo GxHtml::encode($data->dispatchDate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('arrivalDate')); ?>:
	<?php echo GxHtml::encode($data->arrivalDate); ?>
	<br />
	*/ ?>

</div>