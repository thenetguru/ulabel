<?php


class m000000_000039_order_flow extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{OrderFlow}}", array(
      "srcID" => "int(10)",
      "dstID" => "int(10)",
      "priority" => "int(3) default 0",
      "primary key(srcID, dstID)"
    ));

    $this->addForeignKey("fk_order_flow_1", "{{OrderFlow}}", "srcID", "{{OrderStatus}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_order_flow_2", "{{OrderFlow}}", "dstID", "{{OrderStatus}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{OrderFlow}}");
  }
}