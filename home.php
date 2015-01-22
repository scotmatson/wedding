<?php
  session_start();


  # If data has been sent from the login input
  if(isset($_POST['login'])) {
    # First plug in the HTML head so we have access to PHP functions 
    include("./includes/header.php");

    # Open a database connection
    $dbh = dbConnect();  

    # Query the DB for user credentials    
    $r = userLogin($dbh, $_POST['login']);        

    # Credentials are authorized
    if ($r == $_POST['login']) {
      # Serve user account
      $content = "./views/user-info.php";
    }
    else {
      # Close the connection and serve the redirect
      $dbh = null; 
      $content = "./views/redirect.php";
    }
  } 
  else {
    $content = "./views/redirect.php"; 
  }
  # $conn = dbConnect();
  # $arg = $_POST["login"];
  # $result = userLogin($conn, $arg); 
  # echo $arg;

  include($content);
  include("./includes/footer.php");
?>
