<?php

namespace StylistCommerce\CMS;  // Declare namespace

class Session {
 protected static $instance;

 public $id;                                          // Store user's id
 public $first_name;                                    // Store user's forename
 public $role;                                        // Store user's role

 public $timeout = 1000;                             // before session timeout

 public function __construct() {                                                    // Runs when object created
  $this->id       = $_SESSION['id'] ?? 0;          // Set id property of this object
  $this->first_name = $_SESSION['first_name'] ?? '';   // Set forename property of this object
  $this->role     = $_SESSION['role'] ?? 'public'; // Set role property of this object
 }


 public static function action() {
  if (!self::$instance) {
   self::$instance = new self();
  }
  return self::$instance;
 }




 // Create new session
 public function create($user) {
  session_regenerate_id(true);                     // Update session id
  $_SESSION['id']       = $user['id'];           // Add user id to session
  $_SESSION['first_name'] = $user['first_name'];     // Add forename to session
  $_SESSION['role']     = $user['role'];         // Add role to session
 }

 // Update existing session - alias for create()
 public function update($user) {
  $this->create($user);                          // Update data in session
 }

 // Delete existing session
 public function delete() {
  $_SESSION = [];                                  // Empty $_SESSION superglobal
  $param    = session_get_cookie_params();         // Get session cookie parameters
  setcookie(
   session_name(),
   '',
   time() - 2400,
   $param['path'],
   $param['domain'],
   $param['secure'],
   $param['httponly']
  );       // Clear session cookie
  session_destroy();                               // Destroy the session
 }
}
