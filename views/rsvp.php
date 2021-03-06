<body>
  <div id="main">
    <?php
      include("includes/banner-main.php");
      include("includes/nav.php");

      $dbh = dbConnect();  
      $records = displayParty($dbh, $_SESSION['user']);

      $data = "";
      foreach($records as $record) {
        $isAttending = ($record['attending']) ? 'checked' : '';
        $checked = ($isAttending) ? 1 : 0;

        $choice = ($record['foodoption']) ? $record['foodoption'] : ''; 
        $filet = ($choice == 'Filet Mignon') ? 'selected' : '';
        $chicken = ($choice == 'Chicken') ? 'selected' : '';
        $vegetarian = ($choice == 'Vegetarian') ? 'selected' : '';
        $child = ($choice == 'Childs Plate') ? 'selected' : '';
        $data .= 
          "<tr> 
            <td><input type='checkbox' onclick='setAttendance(this);'".$isAttending.">
             <input type='hidden' name='attending[]' value='".$checked."'</td>
             <td>
               <input type='text' value='".$record['firstname']."&nbsp;".
                 $record['lastname']."' readonly>
               <input type='hidden' name='firstname[]' value='".$record['firstname']."'>
               <input type='hidden' name='lastname[]' value='".$record['lastname']."'>
            </td>
            <td>
              <select name='foodoption[]'>
                <option value='".null."'></option> 
                <option value='Filet Mignon' ".$filet.">Filet Mignon</option>
                <option value='Chicken'".$chicken.">Chicken</option>
                <option value='Vegetarian'".$vegetarian.">Vegetarian</option>
                <option value='Childs Plate'".$child.">Child's Plate</option>
              </select>
             </td>
           </tr>";
      }
    ?>

    <div id="content">
      <form id="rsvp" action="home.php?page=confirmation.php" method="POST">
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
        <input type="submit" value="Enter">
      </form>
    <?php 
      if ($_SESSION['user'] == "matson-201") {
      ?>

      <a href='home.php?page=guestData.php'>Guest Information</a>

      <?php 
      }
      else {
      ?>
      <p>Whoops! I broke something during a recent update and don't have time to fix it at the moment. The 'attending' option is not updating the database properly but fortunatley the meal is still being saved. Go ahead and proceed as normal and as long as you've selected a dinner option we will assume you are coming. Thanks!</p>
     <?php } ?> 
    </div>
  </div>
  <script type="text/javascript">
    function setAttendance(isAttending) {
      var currVal = isAttending.nextSibling.value;
      if (currVal == 0) { isAttending.nextSibling.value = 1; }
      else { isAttending.nextSibling.value = 0; }
    }
  </script>
