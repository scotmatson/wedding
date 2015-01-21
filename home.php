<?php
  session_start();
  # Should check credentials here, is valid serve the user-info page,
  #   if invalid serve the redirection page.
  include("./includes/header.php");

  include("./views/redirect.php");
  #include("./views/user-info.php");

  include("./includes/footer.php");
?>
