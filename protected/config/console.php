<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
  "basePath" => dirname(__FILE__) . DIRECTORY_SEPARATOR . "..",
  "name" => "Pilot Commandline Application",

  // preloading "log" component
  "preload" => array("log"),

  "import" => array(
    "application.models.*",
    "application.components.*",
    "ext.giix-components.*",
  ),

  // application components
  "components" => array(
    "db"=>array(
      "connectionString" => "mysql:host=localhost;dbname=ulabel_development",
      "emulatePrepare" => true,
      "username" => "root",
      "password" => "",
      "charset" => "utf8",
      "tablePrefix" => "ul_"
    ),
    "log" => array(
      "class" => "CLogRouter",
      "routes" => array(
        array(
          "class" => "CFileLogRoute",
          "levels" => "error, warning",
        ),
      ),
    ),
  ),
);