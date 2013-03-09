<?php

class m000000_000045_user_branch extends CDbMigration
{
  public function up() {
    $this->createTable("{{UserBranch}}", array(
      "userID" => "int(10)",
      "branchID" => "int(10)",
      "primary key(userID, branchID)"
    ));

    $this->addForeignKey("fk_user_branch_1", "{{UserBranch}}", "userID", "{{User}}", "id", "cascade", "cascade");
    $this->addForeignKey("fk_user_branch_2", "{{UserBranch}}", "branchID", "{{Branch}}", "id", "cascade", "cascade");
  }

  public function down() {
    $this->dropTable("{{UserBranch}}");
  }
}