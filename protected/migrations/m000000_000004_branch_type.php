<?php

class m000000_000004_branch_type extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{BranchType}}", array(
      "id" => "pk",
      "name" => "varchar(50)",
      "priority" => "int(3) default 0"
    ));

    $this->insert("{{BranchType}}", array("name" => "Manufacturer"));
    $this->insert("{{BranchType}}", array("name" => "Distributor"));
    $this->insert("{{BranchType}}", array("name" => "Retailer"));
    $this->insert("{{BranchType}}", array("name" => "Garment Vendor"));
  }

  public function down()
  {
    $this->dropTable("{{BranchType}}");
  }
}