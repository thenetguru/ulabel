<?php

class m000000_000060_history extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{History}}", array(
      "id" => "pk",
      "labelID" => "int(10)",
      "dispatchDate" => "date",
      "arrivalDate" => "date"
    ));

    $this->addForeignKey("fk_history_1", "{{History}}", "labelID", "{{Label}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{History}}");
  }
}