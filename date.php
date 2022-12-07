<?php


include '../../bootstrap.php';

use StylistCommerce\CMS\User;
use StylistCommerce\CMS\UserDay;

$user_id = $_GET['user_id'];

$array_date_time = [];

$user_day_time = UserDay::action()->get_date_time($user_id);

$result_of_schedule = [];


// }
$checker = 0;  // the index that checks if we have exids the length of user_day_time
for ($i = 1; $i < 8; $i++) {

 if (!array_key_exists($checker, $user_day_time)) {
  break;
 }
 // echo 'oui';
 if ($user_day_time[$checker]['day'] ===  $i) {
  if (strpos($user_day_time[$checker]['time_range'], '-') !== false) {

   $time_range = $user_day_time[$checker]['time_range'];
   $arr = explode("-", $time_range, 2);
   $min_time = $arr[0];

   $max_time =  substr($time_range, strpos($time_range, "-") + 1);

   $range_arr = [];

   // echo $min_time . '-' . $max_time . '<br>';

   for ($j = (int)$min_time; $j < (int)$max_time + 1; $j++) {
    $time = $j . ":00";

    // echo $time;
    $range_arr[] = $time;
   }
   $result_of_schedule[] = $range_arr;
  } else {

   $time = $user_day_time[$checker]['time_range'] . ":00";
   $result_of_schedule[] = [$time];
  }

  $checker++;
 } else {
  $result_of_schedule[] = [];
 }
}
// echo '<pre>';
// var_dump($result_of_schedule);
// echo '</pre>';

$today = date('w'); // day of week;

$today = $today - 1;

$final_result = [];

for ($i = 0; $i < 7; $i++) {

 if ($today !== 6) {
  $final_result[] = $result_of_schedule[$today];
  $today = $today + 1;
  # code...
 } else {
  $final_result[] = $result_of_schedule[$today];
  $today = 0;
 }
}



echo json_encode($final_result);
exit;
