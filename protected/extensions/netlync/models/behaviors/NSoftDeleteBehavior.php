<?php

class NSoftDeleteBehavior extends CActiveRecordBehavior
{
  public $deleteColumn = "deleted";

  /**
   * Overload the $owner delete method
   */
  public function delete() {
    $owner = $this->getOwner();
    $alias = $owner->getTableAlias(false, false);
  }

  /**
   * Overload the $owner deleteAll method
   */
  public function deleteAll() {

  }

  /**
   * Permanently remove the owner row from the associated table
   */
  public function purge()
  {

    return true;
  }

  /**
   * Permanently remove the owner rows from the associated tables
   * @parem array $id
   */
  public function purgeAll($id = array())
  {
    if(!empty($id)) {
      foreach($id  as $purgeID) {
        $this->purge();
      }
    }

    return true;
  }

  protected function hasDeleteColumn() {

  }

  protected function createDeleteColumn() {

  }
}