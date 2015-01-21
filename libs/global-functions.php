<?php
  # Establishes a connection with the database
  function dbConnect() {
    require($root."database/security/login.php");
    try {
      $db_connect = new PDO("mysql:host=".$db_hostname.";dbname=".$db_database, $db_username, $db_password);
      $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
    return $db_connect;
  }

  function sqlSelect($dbc, $sql) {
    return $sql;
  }

  function userLogin($dbc, $args) {
    try {
      $sql = "SELECT
                groupnum
              FROM
                person
              WHERE
                groupnum=:groupnum";

      $query = $dbc->prepare($sql);
      $query->execute(array('groupnum' => $args));
    } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage(); 
    }
    if(count($query))  
      echo var_dump($query);
  }
?>
