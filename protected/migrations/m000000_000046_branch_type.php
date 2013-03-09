<?php

class m000000_000046_branch_type extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{BranchBranchType}}", array(
      "id" => "int(10) NOT NULL AUTO_INCREMENT",
      "branchID" => "int(10)",
      "branchTypeID" => "int(10)",
      "deliveryAddressID" => "int(10)",
      "invoiceAddressID" => "int(10)",
      "primary key(id, branchID, branchTypeID)"
    ));

    $this->addForeignKey("fk_branch_branch_type_1", "{{BranchBranchType}}", "branchID", "{{Branch}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_branch_branch_type_2", "{{BranchBranchType}}", "branchTypeID", "{{BranchType}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{BranchBranchType}}");
  }
}