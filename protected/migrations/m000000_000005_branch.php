<?php

class m000000_000005_branch extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Branch}}", array(
      "id" => "pk",
      "companyID" => "int(10)",
      "name" => "varchar(120)",
      "stockCount" => "bigint(20) default 0 not null",
      "transitCount" => "bigint(20) default 0 not null",
    ));

    $this->addForeignKey("fk_branch_2", "{{Branch}}", "companyID", "{{Company}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{Branch}}");
  }
}