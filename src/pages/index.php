<?php

use StylistCommerce\CMS\Category;

// $categories = Category::action()->getAll();
$categories = Category::action()->get_all();


include APP_ROOT . '/templates/index.php';
