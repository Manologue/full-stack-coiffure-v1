<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;


is_stylist(Session::action()->role);                                // Check if stylist


if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}


$booking = Booking::action()->get_by_id($identifier);



$delete_report = Booking::action()->delete_report($identifier);

if ($delete_report) {
 $deleted = Booking::action()->delete($identifier);

 if ($deleted) {
  $_SESSION['success'] = 'this booking has been deleted successfully';
 } else {
  $_SESSION['failure'] = 'something went wrong';
 }
 redirect('account/bookings');
}
