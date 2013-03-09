<?php

class WsdlCommand extends CConsoleCommand
{
  public function run($args) {
    $client = new SoapClient("http://pilot.localhost/api/playground", array(
     "login" => "API_USERNAME",
     "password" => "API_PASSWORD"
    ));
  }
}