<body>
  <div id="main">
    <?php
      include("includes/banner-main.php");
      include("includes/nav.php");
      $dbh = dbConnect();  
      $result = displayAttendees($dbh); 
    ?>
    <div id="content">
      <table id="guestDataSheet">
        <tbody>
        <?php
        $i = 1;
        foreach($result as $k=>$v) {
          echo "<tr>
                  <td>".$i."</td>
                  <td>".$v['firstname']."</td>
                  <td>".$v['lastname']."</td>
                  <td>".$v['foodoption']."</td>
                </tr>";
          ++$i;
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>

