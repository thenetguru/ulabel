<?php

class m000000_000009_label_type extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{LabelType}}", array(
      "id" => "pk",
      "parentID" => "int(10)",
      "name" => "varchar(20)",
      "length" => "int(2)",
      "maxChildren" => "int(4)",
      "priority" => "int(3) default 0"
    ));

    $this->addForeignKey("fk_workflow_1", "{{LabelType}}", "parentID", "{{LabelType}}", "id", "set null", "set null");

    $this->insert("{{LabelType}}", array("name" => "Outer Box", "length"=>6, "priority"=>0));
    $this->insert("{{LabelType}}", array("name" => "Inner Box", "length"=>8, "priority"=>1));
    $this->insert("{{LabelType}}", array("name" => "Bag", "length"=>10, "priority"=>2));
    $this->insert("{{LabelType}}", array("name" => "Label", "length"=>14, "priority"=>3));
  }

  public function down()
  {
    $this->dropTable("{{LabelType}}");
  }
}