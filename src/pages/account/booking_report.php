<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;

is_stylist(Session::action()->role);                                // Check if admin



if ($identifier) {                                               // If valid id
 $booking_report = Booking::action()->get_report($identifier);      // Get Category data

 if (!$booking_report) {                                     // If  empty
  redirect('account/bookings/'); // Redirect
 }
} else {
 redirect('account/bookings/');
}











include APP_ROOT . '/templates/account/booking_report.php';
