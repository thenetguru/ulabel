<?php


class m000000_000041_order_actions extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{OrderAction}}", array(
      "id" => "pk",
      "orderStatusID" => "int(10)",
      "action" => "varchar(40)",
      "priority" => "int(3) default 0"
    ));

    $this->addForeignKey("fk_order_action_1", "{{OrderAction}}", "orderStatusID", "{{OrderStatus}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{OrderAction}}");
  }
}