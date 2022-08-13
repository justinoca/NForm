<!DOCTYPE html>

<html lang="en">

<head>
   <title>NForm</title>
   <meta charset="UTF-8">
   <meta name="description" content="NForm: Home">
   <meta name="author" content="Eesha Singh">

   <link rel="icon" href="nform_icon.png">
   <link href="phase6.css" rel="stylesheet">
   <script src="phase6.js"></script>
</head>

<body onload = "slideshow()">
  <div id="container">
  <!--navigation bar-->
    <div class="topnav">
		<div class="left-links">
			<a class="active" href="phase6.php">Home</a>
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
    			echo "<a href='log_out.php'>Log Out</a>";
    		}
        else{
          echo "<a href='sign_up.php'>Sign Up/Log In</a>";       
        }
    	?>
		</div>
	</div>

 
  <div id="welcome">
    <figure>
      <a href="phase6.php">
      <img src="logo.png" alt="Nform Logo">
      </a>
    </figure>
    <?php  
    if(isset($_COOKIE['loggedIn'])){
      $username = $_COOKIE["loggedIn"];
      echo "<h1>Welcome to NForm, $username!</h1>";
    }
    else{
      echo "<h1>Welcome to NForm</h1>";
    }
    ?>
    <p>The website for all your scheduling needs!</p>
	
	
	<p>&nbsp; </p>
	<audio controls>
	  <source src="music.mp3" type="audio/mpeg">
		<p>Your browser does not support the audio element.</p>
		<br><br>
	</audio>
	
		<p>&nbsp; </p>
	  <!--Displays images in the slideshow-->
      <img src="weather.jpg" id="myPicture" width="300" height="250" alt="Images for the Buttons Below" class="center">
	  
	  <form>
		<!--Two buttons-->
		<input type="button" value="Start" onclick="start();">
		<input type="button" value="End" onclick="end();">		
	  </form>	

      <p><a href="https://www.yahoo.com/news/weather/" class = "button" target="_blank">Weather</a>

      <a href="https://www.austintexas.gov/covid19" class = "button" target="_blank">COVID-19 Updates</a>

      <?php 
        if(isset($_COOKIE['loggedIn'])){
          echo "<a href='add_task.php' class = 'button'>Add Task</a>";
        }
        else{
          echo "<a href='account_verify.php' class = 'button'>Add Task</a>";
        }
      ?>


	  <div id="schedule">
	
	<!--Check if user is logged in or not -->
	<?php 			
      if(!isset($_COOKIE['loggedIn'])){
    
			for ($i=0;$i<10;$i++){

				// find time
				if ($i < 4){
				  $time = strval($i+8).':00am:';
				}
				elseif ($i == 4) {
				  $time = strval($i+8).':00pm:';
				}
				else{
				  $time = strval($i+8-12).':00pm:';
				}
				echo("
				
				<p> $time </p>
				
			  ");
			}
    }
    else{
      
      echo "<form action='phase6.php' method='post'>";
      echo "Enter Date: <input type='date' name='date' required><br>";
      echo "<input type='submit' name='submit' value='Submit'>";
      echo "<input type='reset' name='reset' value='Clear'>";
      echo "</form>";
      
        $username = $_COOKIE['loggedIn'];
        
        $server = "spring-2022.cs.utexas.edu";
        $user = "cs329e_bulko_eeshas4";
        $pwd = 'erode*hearth$Tremor';
        $dbName = "cs329e_bulko_eeshas4";
        $mysqli = new mysqli ($server,$user,$pwd,$dbName);
          // If it returns a non-zero error number, print a
          // message and stop execution immediately
      if ($mysqli->connect_errno) {
          die('Connect Error: ' . $mysqli->connect_errno .
          ": " . $mysqli->connect_error);
        }
      
      if (isset($_POST['submit'])){
        $date = $_POST['date'];
      }
      else{
        $date = date("Y-m-d");
      }
      
      $command = "SELECT taskDate,taskTime,task from tasks where taskDate = '$date' and username = '$username'";
      $result = $mysqli->query($command);
      
      if (!$result) {
        die("Query failed: ($mysqli->error <br> SQL command = $command");
        }
        elseif ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr> <th>Date</th> <th>Time</th> <th>Task</th> </tr>";
        while($row = $result->fetch_assoc()) {
          $strng = "<td>".$row["taskDate"].'</td><td>'.$row["taskTime"].'</td><td>'.$row["task"].'</td>';
          echo "<tr>";
          echo "$strng";
          echo "</tr>";
        }
        echo "</table>";
      } 
      else {
        
        echo "<br>No tasks on $date";
        
      }
      $mysqli->close();
    
        
}
		
	?>

	  </div>
  </div>
  </div>
  
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
