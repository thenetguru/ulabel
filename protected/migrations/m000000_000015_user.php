<?php

class m000000_000015_user extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{User}}", array(
      "id" => "pk",
      "fname" => "varchar(20)",
      "lname" => "varchar(20)",
      "email" => "varchar(120)",
      "pword" => "varchar(20)",
      "canForceDelivery" => "tinyint(1) default 0",
      "active" => "tinyint(1) default 1"
    ));

  }

  public function down()
  {
    $this->dropTable("{{User}}");
  }
}