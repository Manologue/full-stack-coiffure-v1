<?php

include '../../../bootstrap.php';


use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;

is_admin(Session::action()->role);                                // Check if admin







if (isset($_GET['edit'])) {
 $id = $_GET['edit'];

 $user = User::action()->get_by_id($id);

 // echo '<pre>';
 // var_dump($user);
 // echo '</pre>';

 // die;
 echo json_encode($user);
}
