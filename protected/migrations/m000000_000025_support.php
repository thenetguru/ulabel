<?php

class m000000_000025_support extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Support}}", array(
      "id" => "pk",
      "supportTypeID" => "int(10)",
      "supportPriorityID" => "int(10)",
      "subject" => "varchar(40)",
      "created" => "datetime"
    ));

    $this->addForeignKey("fk_support_1", "{{Support}}", "supportTypeID", "{{SupportType}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_support_2", "{{Support}}", "supportPriorityID", "{{SupportPriority}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{Support}}");
  }
}