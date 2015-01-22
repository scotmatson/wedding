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
      # Setting our error mode and allowing for exceptions to be handled.
      $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
        
    }

    return $handler;
  }

  function userLogin($handler, $arg) {
    try {
      $sql = "SELECT
                groupnum
              FROM
                person
              WHERE
                groupnum='$arg'";

      $query = $handler->query($sql);
      $r = $query->fetch();
      echo "<pre>".print_r($r,true)."</pre>";
      #$query->execute(array('groupnum' => $args));

    } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage(); 
    }

    return $r[0];
  }
?>
