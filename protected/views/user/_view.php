<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('fname')); ?>:
	<?php echo GxHtml::encode($data->fname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lname')); ?>:
	<?php echo GxHtml::encode($data->lname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pword')); ?>:
	<?php echo GxHtml::encode($data->pword); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('canForceDelivery')); ?>:
	<?php echo GxHtml::encode($data->canForceDelivery); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('active')); ?>:
	<?php echo GxHtml::encode($data->active); ?>
	<br />

</div>