<?php
  # Requires to use the date(<arg>); function
  date_default_timezone_set("America/Los_Angeles");

  # Establishes a connection with the database
  function dbConnect() {
    # Make sure the proper drivers exist 
    #print_r(PDO::getAvailableDrivers());

    # Obtain the security credentials
    require("../security/login.php");

    try {
      $handler = new PDO("mysql:host=".HOSTNAME.";dbname=".DATABASE, USERNAME, PASSWORD);
      $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
   # return $db_connect;
  }
/*

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
*/
?>
