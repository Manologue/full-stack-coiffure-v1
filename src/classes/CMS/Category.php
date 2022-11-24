<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class Category extends CMS {

 protected static $instance;
 protected $table = "category";



 public static function action() {
  if (!self::$instance) {
   self::$instance = new self();
  }
  return self::$instance;
 }

 public function create($values) {
  //check duplication before
  try {
   //code...
   Database::table($this->table)->insert($values);
   return true;
  } catch (\Exception $e) {
   if (($e instanceof \PDOException) and ($e->errorInfo[1] === 1062)) { // If error is integrity constraint
    return false;                            // Return false
   } else {                                     // For all other reasons
    throw $e;                                // Re-throw exception
   }
  }
 }
 public function update($values, $id) {
  // check duplication before
  try {
   //code...
   Database::table($this->table)->update($values)->where("id = :id", ["id" => $id]);
   return true;
  } catch (\Exception $e) {
   if (($e instanceof \PDOException) and ($e->errorInfo[1] === 1062)) { // If error is integrity constraint
    return false;                            // Return false
   } else {                                     // For all other reasons
    throw $e;                                // Re-throw exception
   }
  }
 }

 public function delete($id) {
  try {
   Database::table($this->table)->delete()->where("id = :id", ["id" => $id]);
   return true;                                 // It worked, return true
  } catch (\PDOException $e) {
   if ($e->errorInfo[1] === 1451) {             // If integrity constraint
    return false;                            // Return false
   } else {                                     // If any other exception
    throw $e;                                // Re-throw exception
   }
  }
 }




 // public function get_all($published = true, $user = null, $limit = 10000) {
 //  $arguments['user'] = $user;             // User id
 //  $arguments['user1'] = $user;             // User id
 //  $arguments['limit']     = $limit;                // Max articles to return


 //  $sql = "SELECT c.id c.title, c.description, "
 // }
}
