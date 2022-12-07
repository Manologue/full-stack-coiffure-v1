<?php

use StylistCommerce\CMS\Category;

// $categories = Category::action()->getAll();
$categories = Category::action()->get_all();
$today = date('w'); // day of week;
// echo $today;
// die;

include APP_ROOT . '/templates/index.php';
