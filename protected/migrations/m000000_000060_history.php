<?php

class m000000_000060_history extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{History}}", array(
      "id" => "pk",
      "labelID" => "int(10)",
      "localDispatchDate" => "datetime DEFAULT NULL",
      "localArrivalDate" => "datetime DEFAULT NULL",
      "gmtDispatchDate" => "datetime DEFAULT NULL",
      "gmtArrivalDate" => "datetime DEFAULT NULL",
      "message" => "varchar(50) DEFAULT NULL"
    ));

    $this->addForeignKey("fk_history_1", "{{History}}", "labelID", "{{Label}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{History}}");
  }
}