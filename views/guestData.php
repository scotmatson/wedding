<body>
  <div id="main">
    <?php
      include("includes/banner-main.php");
      include("includes/nav.php");
      $dbh = dbConnect();  
    ?>
    <div id="content">
    <?php
       $result = displayAttendees($dbh); 
       echo print_r($result,true); 
    ?>
    </div>
  </div>

