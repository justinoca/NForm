<!DOCTYPE html>

<head>
   <title>Verifying Accounts</title>
   <meta charset="UTF-8">
   <meta name="description" content="Verifying Accounts">
   <meta name="author" content="Rosemary Cramblitt">

   <link rel="icon" href="nform_icon.png">
   <link href="phase6.css" rel="stylesheet">
</head>

<html lang="en">
    

<body>
	<div id="container">
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
					echo "<a class='active' href='account_verify.php'>Add Task</a>";
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
    			echo "<a href='log_out.php'>Log Out</a>";
    		}
        else{
          echo "<a href='sign_up.php'>Sign Up/Log In</a>";       
        }
    	?>
		</div>
	</div>
		
		<?php
			$hackname = "Users Must Be Logged in to Add Tasks";
			
			if(!isset($_COOKIE["loggedIn"])) {
				echo '<h2>' . $hackname . '</h2>';
				echo("<button onclick=\"location.href='sign_up.php'\">Sign Up / Log In Here</button>");
				// adds whitespace
				 echo "<p>&nbsp;&nbsp;&nbsp; </p> ";
			} 
			else {
				//Redirect user to add_task.php when user is verified to have logged in
				header('Location: add_task.php');
			}
		?>
		
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
</div>
</body>
</html>