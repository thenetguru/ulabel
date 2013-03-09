<?php


class m000000_000020_api extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Api}}", array(
      "branchID" => "int(10)",
      "token" => "varchar(36)",
      "authentication" => "varchar(36)",
      "primary key(token, authentication)"
    ));

    $this->addForeignKey("fk_api_1", "{{Api}}", "branchID", "{{Branch}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{Api}}");
  }
}