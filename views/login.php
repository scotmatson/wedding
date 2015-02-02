<body>
  <div id="main">
    <?php include("includes/banner-portal.php"); ?>
    <div id="content">
      <form id="access-portal" action="home.php" method="POST">
        <fieldset>
          <p><label for="login">
           Please enter the group ID<br> located on your invitation tag.
          </label></p>
          <p><input type="text" id="login" name="login"
               placeholder="e.g., black-12" autofocus required></p>
          <p><input type="submit"></p>
        </fieldset>
      </form>
    </div>
    <!--<audio src="assets/wav/married-life.mp3" type="audio/mp3" autoplay></audio>
    -->
  </div>
