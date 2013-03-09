<?php

class m000000_000065_pos extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Pos}}", array());
  }

  public function down()
  {
    $this->dropTable("{{Pos}}");
  }
}