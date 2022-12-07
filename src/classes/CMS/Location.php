<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class Location extends CMS {

 protected static $instance;
 protected $table = "location";



 public static function action() {
  if (!self::$instance) {
   self::$instance = new self();
  }
  return self::$instance;
 }




 public function search(string $location) {

  $sql = "SELECT l.name, l.state FROM location AS l WHERE name like '%$location%' OR state like '%$location%'";

  return Database::table($this->table)->query($sql, [])->fetchAll();
 }
}
