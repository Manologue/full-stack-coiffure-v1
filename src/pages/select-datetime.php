<?php

declare(strict_types=1);                                 // Use strict types


use StylistCommerce\CMS\ServiceCreated;
use StylistCommerce\CMS\User;



if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}
$user = User::action()->get_by_url_address($identifier);

if (!$user) {                                          // If user is empty
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}
$id = $user['id'];   // user id


// $user_days = User::action()->get_date_time($id);

// echo '<pre>';
// var_dump($user_days);
// echo '</pre>';

// die;


if (isset($_POST['valid'])) {                         // check that it was validated by cart form before continuing
 $_SESSION["valid_cart_user_{$user['id']}"] = true;
}

$is_valid_location = $_SESSION["chosenLocation_{$user['id']}"] ?? "invalid";  // check if cart location is valid

if (!isset($_SESSION["valid_cart_user_{$user['id']}"]) ||  $is_valid_location !== 'valid') { // if never validated or session expired redirect back to user stylist page 
 header('Location: ' . DOC_ROOT . 'stylist/' . $identifier);
 die;
}



$services = ServiceCreated::action()->get_all(true, $id);  // get all user services


if (!empty($services) || count($services) !== 0) {

 $starter_category_id = $services[0]['category_id'];  // first cat id, note that the query of services is order by category_id

 $categories = []; // initial categories array

 /* arrange each service with its category */
 foreach ($services as $service) {
  $category_title = $service['category'];   // get category title to store it as an array key name

  if ($service['category_id'] === $starter_category_id) {
   $categories[$category_title][] = $service;
  } else {
   $starter_category_id = $service['category_id'];
   $categories[$category_title][] = $service;
  }
 }
 $cart_page = "datetime";
} else {
 echo "<h1>you have no services to offer bro !!!!</h1>";
 die;
}



include APP_ROOT . '/templates/select-datetime.php';
