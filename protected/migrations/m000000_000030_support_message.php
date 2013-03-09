<?php

class m000000_000030_support_message extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{SupportMessage}}", array(
      "id" => "pk",
      "supportID" => "int(10)",
      "userID" => "int(10)",
      "content" => "text",
      "created" => "datetime"
    ));

    $this->addForeignKey("fk_support_message_1", "{{SupportMessage}}", "supportID", "{{Support}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_support_message_2", "{{SupportMessage}}", "userID", "{{User}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{SupportMessage}}");
  }
}