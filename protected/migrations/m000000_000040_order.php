<?php

class m000000_000040_order extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Order}}", array(
      "id" => "pk",
      "srcID" => "int(10)",
      "dstID" => "int(10)",
      "orderStatusID" => "int(10)",
      "userID" => "int(10)",
      "deliveryAddressID" => "int(10)",
      "invoiceAddressID" => "int(10)",
      "orderReference" => "varchar(40)",
      "purchaseOrder" => "varchar(40)",
      "quantity" => "int(10)",
      "required" => "datetime",
      "created" => "datetime"
    ));

    $this->addForeignKey("fk_order_1", "{{Order}}", "srcID", "{{Address}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_order_2", "{{Order}}", "dstID", "{{Address}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_order_3", "{{Order}}", "orderStatusID", "{{OrderStatus}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_order_4", "{{Order}}", "userID", "{{User}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_order_5", "{{Order}}", "deliveryAddressID", "{{Address}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_order_6", "{{Order}}", "invoiceAddressID", "{{Address}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{Order}}");
  }
}