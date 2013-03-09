<?php

class m000000_000007_workflow extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Workflow}}", array(
      "id" => "pk",
      "branchTypeID" => "int(10)",
      "nextBranchTypeID" => "int(10)",
      "priority" => "int(10) default 0",
      "active" => "tinyint(1) default 1"
    ));

    $this->addForeignKey("fk_workflow_1", "{{Workflow}}", "branchTypeID", "{{BranchType}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_workflow_2", "{{Workflow}}", "nextBranchTypeID", "{{BranchType}}", "id", "cascade", "cascade");
  }

  public function down()
  {
    $this->dropTable("{{Workflow}}");
  }
}