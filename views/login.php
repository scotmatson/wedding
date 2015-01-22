<body>
  <div id="main">
    <?php include("includes/banner.php"); ?>
    <div id="content">
      <form id="access-portal" action="index.php" method="POST">
        <fieldset>
          <p><label for="login">
            Enter the name of your party listed on your invitation
          </label></p>
          <p><input type="text" id="login" name="login"
               placeholder="e.g., black-12" required>
             <input type="submit"></p>
        </fieldset>
      </form>
    </div>
  </div>
