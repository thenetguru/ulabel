<?php

class m000000_000002_currency extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Currency}}", array(
      "id" => "pk",
      "character" => "char(3)",
      "iso" => "char(3)"
    ));

    // Create the basic currencies we may need
    $this->insert("{{Currency}}", array("character" => "$", "iso" => "usd"));
    $this->insert("{{Currency}}", array("character" => "$", "iso" => "cad"));
    $this->insert("{{Currency}}", array("character" => "$", "iso" => "aud"));
    $this->insert("{{Currency}}", array("character" => "$", "iso" => "hkd"));
    $this->insert("{{Currency}}", array("character" => "£", "iso" => "gbp"));
    $this->insert("{{Currency}}", array("character" => "£", "iso" => "egp"));
    $this->insert("{{Currency}}", array("character" => "¥", "iso" => "jpy"));
    $this->insert("{{Currency}}", array("character" => "¥", "iso" => "cny"));
    $this->insert("{{Currency}}", array("character" => "€", "iso" => "eur"));
  }

  public function down()
  {
    $this->dropTable("{{Currency}}");
  }
}