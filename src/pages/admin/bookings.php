<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin





$bookings = Booking::action()->get_all(false);
$failure  = $_GET['failure'] ?? null;            // Check for failure message


// echo '<pre>';
// var_dump($bookings);
// echo '</pre>';





include APP_ROOT . '/templates/admin/bookings.php';
