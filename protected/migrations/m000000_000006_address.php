<?php

class m000000_000006_address extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Address}}", array(
      "id" => "pk",
      "branchID" => "int(10)",
      "line1" => "varchar(20)",
      "line2" => "varchar(20)",
      "line3" => "varchar(20)",
      "line4" => "varchar(20)",
      "postcode" => "varchar(20)",
      "telephone" => "varchar(20)",
      "fax" => "varchar(20)",
      "email" => "varchar(20)",
      "countryID" => "int(10)",
    ));

    $this->addForeignKey("fk_address_1", "{{Address}}", "branchID", "{{Branch}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_address_2", "{{Address}}", "countryID", "{{Country}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{Address}}");
  }
}