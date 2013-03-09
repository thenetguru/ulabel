<?php

class m000000_000010_label extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Label}}", array(
      "id" => "pk",
      "labelTypeID" => "int(10)",
      "parentID" => "int(10)",
      "number" => "int(14)",
      "history" => "text",
      "currentAddressID" => "int(10)",
      "destinationAddressID" => "int(10)",
      "requiredDate" => "datetime",
      "dispatchDate" => "datetime",
      "arrivalDate" => "datetime",
    ));

    $this->addForeignKey("fk_label_1", "{{Label}}", "parentID", "{{Label}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_label_2", "{{Label}}", "currentAddressID", "{{Address}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_label_3", "{{Label}}", "destinationAddressID", "{{Address}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_label_4", "{{Label}}", "labelTypeID", "{{LabelType}}", "id", "cascade", "cascade");

    $this->createIndex("idx_label_1", "{{Label}}", "number, labelTypeID", true);
  }

  public function down()
  {
    $this->dropTable("{{Label}}");
  }
}