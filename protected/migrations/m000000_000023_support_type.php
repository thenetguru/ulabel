<?php

class m000000_000023_support_type extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{SupportType}}", array(
      "id" => "pk",
      "name" => "varchar(20)",
      "parentID" => "int(10)",
      "priority" => "int(10)"
    ));

    $this->addForeignKey("fk_support_type_1", "{{SupportType}}", "parentID", "{{SupportType}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{SupportType}}");
  }
}