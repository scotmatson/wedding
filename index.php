<?php
  session_start();
  include("./includes/header.php");

  if(isset($_POST['login'])) {
    $_SESSION['user'] = $_POST['login'];

    # Plug in the HTML head so we have access to PHP functions 

    # Open a database connection
    $dbh = dbConnect();  
    # Query the DB for user credentials    
    $results = userLogin($dbh, $_POST['login']);        

    # If credentials are authorized
    if ($results == $_POST['login']) {
      # Serve user account
      $page = (isset($_GET['page'])) ? $_GET['page'] : 0;  
      $dbh = null;
    }
    # If access is denied
    else {
      # Close the connection and serve the redirect
      $dbh = null; 
      include("views/redirect.php");
      session_destroy();
    }
  } 
  else if(isset($_SESSION['user'])) {
    $page = $_GET['page'];
  }
  else {
    include("views/redirect.php"); 
    session_destroy();
  }

  # If $page has a value
  if(!empty($page)) { include("views/".$page); }
  # Otherwise include the default page
  else { include("views/home.php"); }

  #include($content);
  include("./includes/footer.php");
?>
