<?php


include '../../bootstrap.php';

use StylistCommerce\CMS\User;

$user_id = $_GET['user_id'];

$array_date_time = [];

$user_day_time = User::action()->get_date_time($user_id);

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
   $min_time_with_minutes = $arr[0];
   $arr = explode(":", $min_time_with_minutes, 2);
   $min_time = $arr[0];
   $min_time_minutes = substr($min_time_with_minutes, strpos($min_time_with_minutes, ":") + 1);


   $max_time_with_minutes =  substr($time_range, strpos($time_range, "-") + 1);
   $arr = explode(":", $max_time_with_minutes, 2);
   $max_time = $arr[0];
   $max_time_minutes = substr($max_time_with_minutes, strpos($max_time_with_minutes, ":") + 1);




   $range_arr = [];

   // echo $min_time . '-' . $max_time . '<br>';

   for ($j = (int)$min_time; $j < (int)$max_time + 1; $j++) {
    if ($j == $min_time) {
     $time = $j . ':' . $min_time_minutes;
    } else if ($j == $max_time) {
     $time = $j . ':' . $max_time_minutes;
    } else {
     $time = $j . ":00";
    }
    // echo $time;
    $range_arr[] = $time;
   }
   $result_of_schedule[] = $range_arr;
  } else {

   $time = $user_day_time[$checker]['time_range'];
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
// die;
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
