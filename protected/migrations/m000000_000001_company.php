<?php

class m000000_000001_company extends CDbMigration
{
  public function up()
  {
    $this->createTable("{{Company}}", array(
      "id" => "pk",
      "name" => "varchar(20)"
    ));

    $this->insert("{{Company}}", array("name"=>"Britannia Labels"));
    $this->insert("{{Company}}", array("name"=>"Avery Labels"));
    $this->insert("{{Company}}", array("name"=>"SML Group"));
    $this->insert("{{Company}}", array("name"=>"LabelDrop"));
  }

  public function down()
  {
    $this->dropTable("{{Company}}");
  }
}