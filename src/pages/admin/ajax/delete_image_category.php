<?php

include '../../../bootstrap.php';

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin

if (isset($_GET['delete'])) {
 $identifier = $_GET['delete'];


 if ($identifier) {                                               // If valid id
  $category = Category::action()->get($identifier, false);      // Get Category data
  if (!$category) {                                     // If  empty
   echo 'false';
   die;
  }
 }

 $image = $category['image'];

 $direction = APP_ROOT . '/public/uploads/' . $image;

 if ($image == "" || $image == "blank.png") {
  echo 'false';
 } else {
  if (file_exists($direction)) {                        // If image file exists
   unlink($direction);                               // Delete image file
  }
  $category['image'] = "blank.png";
  $updated = Category::action()->update($category, $identifier, null, null);
  if ($updated) {
   // redirect('admin/category/' . $identifier, ['success' => 'picture removed successfully']); // Redirect
   echo 'true';
  }
 }
}
