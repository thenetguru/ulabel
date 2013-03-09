<?php

class m000000_000038_order_status extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{OrderStatus}}", array(
      "id" => "pk",
      "name" => "varchar(20)",
      "priority" => "int(3) default 0"
    ));

    $this->insert("{{OrderStatus}}", array("name" => "New", "priority" => 0));
    $this->insert("{{OrderStatus}}", array("name" => "Awaiting Dispatch", "priority" => 1));
    $this->insert("{{OrderStatus}}", array("name" => "Dispatched", "priority" => 2));
    $this->insert("{{OrderStatus}}", array("name" => "Delivered", "priority" => 4));
    $this->insert("{{OrderStatus}}", array("name" => "Complete", "priority" => 5));
    $this->insert("{{OrderStatus}}", array("name" => "Partial Dispatch", "priority" => 3));
  }

  public function down()
  {
    $this->dropTable("{{OrderStatus}}");
  }
}