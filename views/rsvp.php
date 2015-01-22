<body>
  <div id="main">
    <?php
      include("includes/banner.php");
      include("includes/nav.php");

      $dbh = dbConnect();  
      $records = displayParty($dbh, $_SESSION['user']);

      $data = "";
      foreach($records as $record) {
        $checked = ($record['attending']) ? 'checked' : '';

        $choice     = ($record['foodoption'])     ? $record['foodoption'] : ''; 
        $filet      = ($choice == 'Filet Mignon') ? 'selected'            : '';
        $chicken    = ($choice == 'Chicken')      ? 'selected'            : '';
        $vegetarian = ($choice == 'Vegetarian')   ? 'selected'            : '';

        $data .= 
          "<tr>". 
            "<td><input type='checkbox' name='attending' ".$checked."></td>".
            "<td><input type='text' name='name' value='".$record['firstname'].
              "&nbsp;".$record['lastname']."' readonly></td>".
            "<td>
              <select name='foodoption'>
                <option></option> 
                <option value='Filet Mignon' ".$filet.">Filet Mignon</option>
                <option value='Chicken'".$chicken.">Chicken</option>
                <option value='Vegetarian'".$vegetarian.">Vegetarian</option>
              </select>
             </td>".
          "</tr>";
      }
      # Insert changes
    ?>
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

