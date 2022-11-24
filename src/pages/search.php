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


$categories = Category::action()->getAll();

$users = User::action()->search($data['location'], $data['services'], $data['day']);

$count = count($users);

// getting each user with all his categories
foreach ($users as $user) {
 $users_infos[] =  User::action()->get_all(true, null, $user['id']);
}



include APP_ROOT . '/templates/search.php';
