<?php

declare(strict_types=1);                                 // Use strict types

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\User;

$data['location']      = filter_input(INPUT_GET, 'location');
$data['services']      = filter_input(INPUT_GET, 'services');
$data['day']      = filter_input(INPUT_GET, 'day');

if (empty($data['location'])) {
 header('Location: ' . DOC_ROOT);
 die;
}


// $categories = Category::action()->getAll();

$users = User::action()->search($data['location'], $data['services'], $data['day']);


// getting each user with all his categories if user is published and not suspended check the get_all() method
$i = 0;
foreach ($users as $user) {
 $check =  User::action()->get_all(true, null, $user['id']);
 if (!$check) {
  // echo "no";
  unset($users[$i]);
  $i++;
  continue;
 }
 $users_infos[] =  User::action()->get_all(true, null, $user['id']);
}

$count = count($users);

include APP_ROOT . '/templates/search.php';
