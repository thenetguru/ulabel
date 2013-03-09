<?php

class m000000_000003_country extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Country}}", array(
      "id" => "pk",
      "name" => "varchar(120)",
      "iso" => "char(2)",
      "priority" => "int(7)",
      "sticky" => "tinyint(1) default 0",
      "currencyID" => "int(10)",
    ));

    $this->addForeignKey("fk_country_1", "{{Country}}", "currencyID", "{{Currency}}", "id", "cascade", "cascade");

    $this->createIndex("idx_country_1", "{{Country}}", "iso", false);
    $this->createIndex("idx_country_2", "{{Country}}", "name", false);
    $this->createIndex("idx_country_3", "{{Country}}", "currencyID", false);
  }

  public function down()
  {
    $this->dropTable("{{Country}}");
  }
}