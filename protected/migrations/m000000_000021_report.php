<?php

class m000000_000021_report extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Report}}", array(
      "id" => "pk",
      "name" => "varchar(20)",
      "branchID" => "int(10)",
    ));
  }

  public function down()
  {
    $this->dropTable("{{Report}}");
  }
}