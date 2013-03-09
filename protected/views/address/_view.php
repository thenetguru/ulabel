<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('branchID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->branch)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('line1')); ?>:
	<?php echo GxHtml::encode($data->line1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('line2')); ?>:
	<?php echo GxHtml::encode($data->line2); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('line3')); ?>:
	<?php echo GxHtml::encode($data->line3); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('line4')); ?>:
	<?php echo GxHtml::encode($data->line4); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('postcode')); ?>:
	<?php echo GxHtml::encode($data->postcode); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('telephone')); ?>:
	<?php echo GxHtml::encode($data->telephone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fax')); ?>:
	<?php echo GxHtml::encode($data->fax); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('countryID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->country)); ?>
	<br />
	*/ ?>

</div>