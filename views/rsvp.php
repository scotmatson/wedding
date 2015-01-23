<body>
  <div id="main">
    <?php
      include("includes/banner.php");
      include("includes/nav.php");

      $dbh = dbConnect();  
      $records = displayParty($dbh, $_SESSION['user']);

      $data = "";
      foreach($records as $record) {
        $isAttending = ($record['attending'])      ? 'checked'             : '';
        $checked     = ($isAttending)                  ? 1                     : 0;

        $choice     = ($record['foodoption'])     ? $record['foodoption'] : 'Undecided'; 
        $filet      = ($choice == 'Filet Mignon') ? 'selected'            : '';
        $chicken    = ($choice == 'Chicken')      ? 'selected'            : '';
        $vegetarian = ($choice == 'Vegetarian')   ? 'selected'            : '';

        $data .= 
          "<tr> 
            <td><input type='checkbox' onclick='setAttendance(this);'".$isAttending.">".
            "<input type='hidden' name='attending[]' value='".$checked."'</td>".
            "<td><input type='text' name='name[]' value='".$record['firstname'].
              "&nbsp;".$record['lastname']."' readonly></td>".
            "<td>
              <select name='foodoption[]'>
                <option value='undecided'>Undecided</option> 
                <option value='filet' ".$filet.">Filet Mignon</option>
                <option value='chicken'".$chicken.">Chicken</option>
                <option value='vegetarian'".$vegetarian.">Vegetarian</option>
              </select>
             </td>".
          "</tr>";
      }
      # Insert changes
    ?>
    </script>
    <div id="content">
      <h2>R.S.V.P.</h2>
      <form action="index.php?page=confirmation.php" method="POST">
        <table>
          <thead>
            <th>Attending</th>
            <th>Name</th>
            <th>Food Option</th>
          </thead>           
          <tbody>
            <?php echo $data; ?>   
          </tbody>
        </table>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>

  <script type="text/javascript">
    function setAttendance(isAttending) {
      var currVal = isAttending.nextSibling.value;
      if (currVal == 0) { isAttending.nextSibling.value = 1; }
      else { isAttending.nextSibling.value = 0; }
    }
  </script>
  
