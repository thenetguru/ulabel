<?php

class m000000_000042_order_item extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{OrderItem}}", array(
      "id" => "pk",
      "orderID" => "int(10)",
      "labelID" => "int(10)",
      "quantity" => "int(10)",
      "created" => "datetime"
    ));

    $this->addForeignKey("fk_order_item_1", "{{OrderItem}}", "orderID", "{{Order}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_order_item_2", "{{OrderItem}}", "labelID", "{{Label}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{OrderItem}}");
  }
}