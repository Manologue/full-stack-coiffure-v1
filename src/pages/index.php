<?php

use StylistCommerce\CMS\Category;

$categories = Category::action()->getAll();


include APP_ROOT . '/templates/index.php';
