<body>
  <div id="main">
    <?php include("includes/banner.php"); ?>
    <div id="content">
      <form id="access-portal" action="home.php" method="POST">
        <fieldset>
          <p><label for="login">
           Please enter your group ID<br> located on your invitation tag.
          </label></p>
          <p><input type="text" id="login" name="login"
               placeholder="e.g., black-12" autofocus required>
             <input type="submit"></p>
        </fieldset>
      </form>
    </div>
  </div>
