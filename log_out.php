<!DOCTYPE html>

<html lang="en">

<head>
   <title>Log Out</title>
   <meta charset="UTF-8">
   <meta name="description" content="Log Out">
   <meta name="author" content="Rosemary Cramblitt">

   <link rel="icon" href="nform_icon.png">
   <link href="phase6.css" rel="stylesheet">
   <script src="phase6.js"></script>
</head>
<body>
  <?php 


  $username = $_COOKIE['username'];
  setcookie("loggedIn", $username, time()-3600, "/");
  ?>
  
  <!--navigation bar-->
    <div class="topnav">
		<div class="left-links">
			<a href="phase6.php">Home</a>
			<!--Users must first be cerified to have logged in-->
			<?php 
				if(isset($_COOKIE['loggedIn'])){
					echo "<a href='add_task.php'>Add Task</a>";
				}
				else{
					echo "<a href='account_verify.php'>Add Task</a>";
				}
			?>
						
			<a href="https://www.yahoo.com/news/weather/" target="_blank">Weather</a>
			<a href="https://www.austintexas.gov/covid19" target="_blank">COVID-19 Updates</a>
		</div>

		<div class="right-links">
			<a href="contact_us.php">Contact Us</a>
      <?php 
    		if(isset($_COOKIE['loggedIn'])){
    			$username = $_COOKIE["loggedIn"];
    			echo "<a class='active' href='log_out.php'>Log Out</a>";
    		}
        else{
          echo "<a href='sign_up.php'>Sign Up/Log In</a>";       
        }
    	?>
		</div>
	</div>

  <h2>Log Out</h2>
  <p>You have been logged out. Thank you!</p>
  
  We'd love your feedback. Please rate our website from 1-5!
  <form action = 'log_out.php' method="post">
    <input type="number" id="number" value="1-5"><br><br>
    <input type="submit" name="submit" value="Submit" onclick = "rating()">
  </form>
  <br><br>
  

  
  <a href="phase6.php" class='button'>Return Home</a>
  
  <div id="footer">
		<span>&copy;Team 20: Jalisa Broussard, Rosemary Cramblitt, Justin Oca, Eesha Singh</span>
		<br>
        <span>
				Page Last Updated:
			<script>
				document.write(document.lastModified);
			</script>
        </span>
    </div>
  
  
</body>
</html>