<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
  <div class="row-fluid">
    <div class="span3 last">
      <?php
        $this->widget("bootstrap.widgets.TbMenu", array(
          "type" => "list",
          "items" => array_merge(array(array("label"=>"OPERATIONS")), $this->menu),
        ));
      ?>
    </div>
    <div class="span9">
      <?php echo $content; ?>
      <!-- content -->
    </div>
  </div>
<?php $this->endContent(); ?>