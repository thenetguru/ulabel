<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('branchTypeID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->branchType)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nextBranchTypeID')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->nextBranchType)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('priority')); ?>:
	<?php echo GxHtml::encode($data->priority); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('active')); ?>:
	<?php echo GxHtml::encode($data->active); ?>
	<br />

</div>