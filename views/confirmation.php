<body>
  <div id="main">
    <?php
      include("includes/banner-main.php");
      include("includes/nav.php");
      
      # Access the DB
      $dbh = dbConnect(); 
      # Sort the data, assuming all rows will have the same number of records
      for($i = 0; $i< count($_POST['attending']); ++$i) {
        $record = "";
        foreach($_POST as $key) {
          $record .= $key[$i].".";
        }  
        # Update the records
        updateDb($dbh, $record); 
      }
    
    ?>
    <div id="content">
      <h2>Success!</h2>
      <p>We've gone ahead and updated our database, but feel free to make any changes as you see fit before the deadline.</p>
      <p>Diana and I are greatly looking forward to having you join us for our special day! See you there.</p>
    </div>
  </div>

