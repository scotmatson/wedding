<?php
  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(-1); 

  # If data has been sent from the login input
  if(isset($_POST['login'])) {
    # First plug in the HTML head so we have access to PHP functions 
    include("./includes/header.php");

    # Open a database connection
    $handler = dbConnect();  

    $content = "./views/user-info.php";
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
