var timer = 5;
 
function countdown() {
  if (timer <= 0) {
    window.location = "portal.php";
  }
  else {
    document.getElementById("countdown").innerHTML=timer;
    window.setTimeout("countdown()", 1000); 
  }
  --timer;
} 
