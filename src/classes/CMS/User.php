<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class User extends CMS {

  protected static $instance;
  protected $table = "user";



  public static function action() {
    if (!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function create($user) {
    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);  // Hash password
    try {
      //code...
      Database::table($this->table)->insert($user);
      return true;
    } catch (\Exception $e) {
      if (($e instanceof \PDOException) and ($e->errorInfo[1] === 1062)) { // If error is integrity constraint
        return false;                            // Return false
      } else {                                     // For all other reasons
        throw $e;                                // Re-throw exception
      }
    }
  }

  public function update($user, $id) {
    // check duplication before
    try {
      //code...
      Database::table($this->table)->update($user)->where("id = :id", ["id" => $id]);
      return true;
    } catch (\Exception $e) {
      if (($e instanceof \PDOException) and ($e->errorInfo[1] === 1062)) { // If error is integrity constraint
        return false;                            // Return false
      } else {                                     // For all other reasons
        throw $e;                                // Re-throw exception
      }
    }
  }

  public function delete($id) {
    try {
      Database::table($this->table)->delete()->where("id = :id", ["id" => $id]);
      return true;                                 // It worked, return true
    } catch (\PDOException $e) {
      if ($e->errorInfo[1] === 1451) {             // If integrity constraint
        return false;                            // Return false
      } else {                                     // If any other exception
        throw $e;                                // Re-throw exception
      }
    }
  }

  public function login(string $email, string $password) {
    $user = $this->action()->get_by_email($email);
    if (!$user) {                                             // If no member found
      return false;                                           // Return false
    }                                                           // Otherwise
    $authenticated = password_verify($password, $user['password']); // Did password match
    return ($authenticated ? $user : false);                  // Return whether password matched
  }

  //**** this is strickly for stylist in user category */
  public function get_all($published = true, $category = null, $user = null, $limit = 10000) {
    $arguments['category']  = $category;             // Category id
    $arguments['category1'] = $category;             // Category id
    $arguments['user'] = $user;             // User id
    $arguments['user1'] = $user;             // User id
    $arguments['limit']     = $limit;                // Max articles to return

    $sql = "SELECT u.id, u.city, u.state, u.years_exp, c.title AS category, 
                 u.first_name, u.name, u.price_starter, u.picture, u.url_address,
                 CONCAT(u.first_name, ' ', u.name) AS username
                 FROM user_category AS uc
                 JOIN user AS u ON uc.user_id = u.id
                 JOIN category AS c ON uc.category_id = c.id

          WHERE (uc.category_id = :category OR :category1 is null) 
            AND (uc.user_id   = :user   OR :user1   is null) ";

    if ($published) {                                // If must be published
      $sql .= "AND u.published = 1 AND u.role = 'stylist' ";              // Add clause to SQL
    }

    // when we want to select as the users
    if ($category == null && $user == null) {
      $sql .= "GROUP BY u.id";
    }
    $sql .= " LIMIT :limit;";

    return Database::table('user_category')->query($sql, $arguments)->fetchAll();
  }

  public function search(string $location, string $services = '', string $day = '') {
    $day = date('l', strtotime($day));
    $day_name = '%' . $day . '%';
    $services_list  = explode(",", $services);
    $arguments['location'] = '%' . $location . '%';
    $sql_custom = "WHERE u.city LIKE :location ";

    $i = 1;
    if ($services !== '') {
      foreach ($services_list as $service) {
        $arguments["service$i"] = '%' . $service . '%';
        $sql_custom .= "OR c.title LIKE :service$i ";
        $i++;
      }
    }
    if ($day !== '') {
      $arguments['day'] = $day_name;
      $sql_custom .= "OR d.name LIKE :day ";
    }


    $sql = "SELECT u.id, u.city, u.state, u.years_exp, c.title AS category, 
                 u.first_name, u.name, u.price_starter, u.picture, u.url_address,
                 CONCAT(u.first_name, ' ', u.name) AS username
                 FROM user_category AS uc
                  JOIN user AS u 
                    LEFT JOIN user_day AS ud 
                         INNER JOIN day AS d ON ud.day_id = d.id
                        ON u.id = ud.user_id
                    ON uc.user_id = u.id
                   JOIN category AS c ON uc.category_id = c.id ";

    $sql .= $sql_custom;


    $sql .= "GROUP BY u.id";


    return Database::table($this->table)->query($sql, $arguments)->fetchAll();
  }



  public function get_gallery($user_id) {
    return Database::table('gallery')->select()->where("user_id = :user_id", ["user_id" => $user_id])->fetchAll();
  }


  public function get_date_time($user = null, $day = null, $order_of_days = true, $published = true) {
    $arguments['user']  = $user;
    $arguments['user1'] = $user;
    $arguments['day'] = $day;
    $arguments['day1'] = $day;
    $sql = "SELECT ud.day_id AS day, ud.time AS time_range
              FROM user_day AS ud
              JOIN user AS u ON ud.user_id = u.id

              WHERE (ud.user_id = :user OR :user1 is null) 
              AND (ud.day_id   = :day   OR :day1   is null) ";

    if ($published) {                                // If must be published
      $sql .= "AND u.published = 1 ";                // Add clause to SQL
    }

    if ($order_of_days) {   // by order of days from 1 to 7 
      $sql .= "GROUP BY ud.day_id";
    }

    return Database::table("user_day")->query($sql, $arguments)->fetchAll();
  }

  /***********************end of user category */
}
