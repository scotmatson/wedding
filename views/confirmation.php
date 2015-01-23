<body>
  <div id="main">
    <?php
      include("includes/banner.php");
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
      <h2>Confirmation Page</h2>
      <p>Redirect.... </p>
    </div>
  </div>

