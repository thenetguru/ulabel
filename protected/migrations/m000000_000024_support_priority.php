<?php

class m000000_000024_support_priority extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{SupportPriority}}", array(
      "id" => "pk",
      "name" => "varchar(20)",
      "priority" => "int(10)"
    ));
  }

  public function down()
  {
    $this->dropTable("{{SupportPriority}}");
  }
}