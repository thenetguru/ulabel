<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('srcID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->src)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dstID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->dst)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('orderStatusID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->orderStatus)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('userID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('deliveryAddressID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->deliveryAddress)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('invoiceAddressID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->invoiceAddress)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('orderReference')); ?>:
	<?php echo GxHtml::encode($data->orderReference); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('purchaseOrder')); ?>:
	<?php echo GxHtml::encode($data->purchaseOrder); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('quantity')); ?>:
	<?php echo GxHtml::encode($data->quantity); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('required')); ?>:
	<?php echo GxHtml::encode($data->required); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created')); ?>:
	<?php echo GxHtml::encode($data->created); ?>
	<br />
	*/ ?>

</div>