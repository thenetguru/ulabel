<?php

class m000000_000050_branch_type_user extends CDbMigration
{
  public function up() {
    $this->createTable("{{UserBranchType}}", array(
      "userID" => "int(10)",
      "branchBranchTypeID" => "int(10)",
      "primary key(userID, branchBranchTypeID)"
    ));

    $this->addForeignKey("fk_user_branch_type_1", "{{UserBranchType}}", "userID", "{{User}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_user_branch_type_2", "{{UserBranchType}}", "branchBranchTypeID", "{{BranchBranchType}}", "id", "cascade", "cascade");
  }

  public function down() {
    $this->dropTable("{{UserBranchType}}");
  }
}