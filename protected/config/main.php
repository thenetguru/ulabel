<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias("local","path/to/local-folder");

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias("bootstrap", dirname(__FILE__) . "/../extensions/bootstrap");

return array(
  "basePath" => dirname(__FILE__) . DIRECTORY_SEPARATOR . "..",
  "name" => "ULabel Aviator",

  // preloading "log" component
  "preload" => array("log", "bootstrap"),

  // autoloading model and component classes
  "import" => array(
    "application.models.*",
    "application.components.*",
    "ext.giix-components.*",
  ),

  "modules" => array( // uncomment the following to enable the Gii tool
    "gii" => array(
      "class" => "system.gii.GiiModule",
      "password" => "p",
      "generatorPaths" => array(
        "ext.giix-core",
        "bootstrap.gii",
      ),
    ),
  ),

  // application components
  "components" => array(
    "bootstrap" => array(
      "class" =>"bootstrap.components.Bootstrap",
      "responsiveCss" => "true"
    ),
    "user" => array(
      // enable cookie-based authentication
      "allowAutoLogin" => true,
    ),
    // uncomment the following to enable URLs in path-format
    "urlManager" => array(
      "urlFormat" => "path",
      "showScriptName" => false,
      "rules" => array(
        /*
        "/api/output" => "api/output",

        array(
          "/api/list", "pattern" => "/api/<model:\w+>.<format:(xml|json)?>", "caseSensitive" => false, "verb" => "GET",
        ),
        */

        "<controller:\w+>/<id:\d+>" => "<controller>/view",
        "<controller:\w+>/<action:\w+>/<id:\d+>" => "<controller>/<action>",
        "<controller:\w+>/<action:\w+>" => "<controller>/<action>",
      ),
    ),
    "db"=>array(
      "connectionString" => "mysql:host=localhost;dbname=ulabel_development",
      "emulatePrepare" => true,
      "username" => "root",
      "password" => "",
      "charset" => "utf8",
      "tablePrefix" => "ul_"
    ),
    "errorHandler" => array(
      // use "site/error" action to display errors
      "errorAction" => "site/error",
    ),
    "cache" => array(
      "class" => "system.caching.CApcCache",
      "keyPrefix" => "aviator_"
    ),
    "log" => array(
      "class" => "CLogRouter",
      "routes" => array(
        array(
          "class" => "CFileLogRoute",
          "levels" => "error, warning",
        ),
        // uncomment the following to show log messages on web pages
        /*
        array(
            "class"=>"CWebLogRoute",
        ),
        */
      ),
    ),
  ),

  // application-level parameters that can be accessed
  // using Yii::app()->params["paramName"]
  "params" => array(
    // this is used in contact page
    "adminEmail" => "webmaster@example.com",
  ),
);