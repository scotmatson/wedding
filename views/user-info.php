<?php
  if(isset($_POST["login"])) {
  # This page must only be accessed if the appropriate credentials are given.


 #   function authUser() {
 #     $conn = dbConnect();
 #     $arg = $_POST["login"];
 #     $result = userLogin($conn, $arg); 
 #     echo $arg;
 #   }
  }
  else {
    # If the user attempts to access the home page through the URL
    #   immedately redirect them to the login page
    header("Location: index.php"); 
  }
?>

