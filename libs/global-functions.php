<?php
  # Requires to use the date(<arg>); function
  date_default_timezone_set("America/Los_Angeles");

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

    } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage(); 
    }
    return $r[0];
  }
  
  function displayParty($dbh, $arg) {
    try {
      $sql = "SELECT
                lastname,
                firstname,
                attending,
                foodoption
              FROM
                person
              WHERE
                groupnum='$arg'"; 
      
      $query = $dbh->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();

    } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
  
    return $result;
  }

  function updateDB($dbh, $arg) {
    $arg = rtrim($arg, ".");
    $arg = explode(".",$arg);
    $attending  = isset($arg[0]) ? $arg[0] : null;
    $firstname  = isset($arg[1]) ? $arg[1] : null;
    $lastname   = isset($arg[2]) ? $arg[2] : null;
    $foodoption = isset($arg[3]) ? $arg[3] : null;
    echo "<pre>" .print_r($arg, true). "</pre>";
    try {
      $sql = "UPDATE
                person
              SET
                attending='$attending',
                foodoption='$foodoption'
              WHERE
                (lastname='$lastname' AND firstname='$firstname')";

      $query = $dbh->prepare($sql);
      $query->execute();

    } catch(PDOException $e) {
        echo "ERROR: " .$e->getMessage();
    }
  }
?>
