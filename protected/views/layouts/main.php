<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
  <style>
    body, html {
      height: 100%;
    }

    body{
      padding-top: 60px;
    }

    #wrap {
      min-height: 100%;
      height: auto !important;
      height: 100%;
      margin: 0 auto -60px;
      overflow: hidden;
      position: relative;
    }

    #footer {
      height: 60px;
      overflow: hidden;
    }

    @media (max-width: 767px) {
      #footer {
        margin-left: -20px;
        margin-right: -20px;
        padding-left: 20px;
        padding-right: 20px;
      }
    }
  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="language" content="en"/>
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<section id="wrap">
  <header>
      <?php
      $this->widget("bootstrap.widgets.TbNavbar", array(
        "type" => "inverse",
        "brand" => "Aviator",
        "brandUrl" => "#",
        "collapse" => false,
        "fluid" => false,
        "items" => array(
          array(
            "class" => "bootstrap.widgets.TbMenu",
            "items" => array(
              "---",
              array("label" => "Workflow", "url" => $this->createUrl("/workflow/admin"), "icon" => "share white"),
              array("label" => "Labels", "url" => $this->createUrl("/label/admin"), "icon" => "tags white"),
              array("label" => "Company", "url" => $this->createUrl("/company/admin"), "icon" => "home white"),
              array("label" => "Countries", "url" => $this->createUrl("/country/admin")),
              array("label" => "System Support", "items" => array(
                array("label" => "SUPPORT RESPONSE"),
                array("label" => "Open Tickets", "url" => $this->createUrl("/support")),
                array("label" => "Tickets I Own", "url" => $this->createUrl("/support")),
                "---",
                array("label" => "TICKET MANAGEMENT"),
                array("label" => "Manage Ticket Types", "url" => $this->createUrl("supportType/admin"))
              )),

              array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
              array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
            )
          )
        ),
      ))
      ?>
  </header>
  <div class="container">
    <div>
    <h2>Welcome to Aviator</h2>
    <?php if (isset($this->breadcrumbs)): ?>
      <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
    <?php endif?>
    </div>
    <?php echo $content; ?>
  </div>
  <br/>
</section>
<br/>
<!-- page -->
<footer id="footer">
  <div class="container">
    Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
    All Rights Reserved.<br/>
    <?php echo Yii::powered(); ?>
  </div>
</footer>
</body>
</html>
