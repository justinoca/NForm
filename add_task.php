<!DOCTYPE html>

<html lang="en">

<head>
   <title>Add Task</title>
   <meta charset="UTF-8">
   <meta name="description" content="NForm: Add Task">
   <meta name="author" content="Eesha Singh">

   <link rel="icon" href="nform_icon.png">
   <link href="phase6.css" rel="stylesheet">
   <script src="phase6.js"></script>
</head>
<body>
  <?php 
    if (!isset($_COOKIE['loggedIn'])){
      echo "<script type='text/javascript'>alert('Please log in to view this page.')</script>";
      header("refresh:.2;url=phase6.php");
    }
     ?>
  
  <div id="container">

  <!--navigation bar-->
    <div class="topnav">
		<div class="left-links">
		<a href="phase6.php">Home</a>
    <?php 
      if(isset($_COOKIE['loggedIn'])){
        echo "<a href='add_task.php' class='active'>Add Task</a>";
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
          echo "<a href='sign_up.php'>Sign Up</a>";
          echo "<a href='log_in.php'>Log In</a>";
          
        }
      ?>
		</div>
	</div>
	
    <div class="add_task">
      
    <figure>
      <a href="phase6.php">
      <img src="logo.png" alt="Nform Logo">
      </a>
    </figure>
      
	
	<audio controls>
	  <source src="music.mp3" type="audio/mpeg">
		<p>Your browser does not support the audio element. &nbsp; &nbsp; </p>
	</audio>  
	
    <h3>Add Task</h3>
	

    <table>
      <form action="add_task.php" method="post">
      
      <table>
        <tr>
          <td>Date: </td><td> <input type="date" name="date" required> </td>
        </tr>
        <tr>
          <td>Time: </td><td> <input type="time" name="time" required></td>
        </tr>
        <tr>
          <td>Task: </td><td> <input type="text" name="task" size = '20' required></td>
        </tr>
      </table>
      <br>
      <input type="submit" name="submit" value="Submit">
      <input type="reset" name="reset" value="Clear">
      </table>
      <br>
	  <br> <br> <br>
      </form>
      
      <?php

      
      // update SQL database
      if (isset($_POST['submit'])){
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
      }
        $date = $_POST['date'];
        $time = $_POST['time'];
        $task = $_POST['task'];
        $username = $_COOKIE['loggedIn'];
        $command = "INSERT INTO tasks (username,taskDate,taskTime,task) VALUES('$username','$date', '$time', '$task')";
        $result = $mysqli->query($command);
        if (!$result) {
          die("Query failed: ($mysqli->error <br> SQL command = $command");
          }
        else{
          echo "<script type='text/javascript'>alert('Action successful!')</script>";
        }

        $mysqli->close();
        // CREATE TABLE tasks (
        //    task_id    INT AUTO_INCREMENT,
        //    username   VARCHAR(10),
        //    taskDate   DATE,
        //    taskTime   TIME,
        //    task VARCHAR(20),
        //    PRIMARY KEY (task_id)
        // );
        // INSERT INTO tasks (username,taskDate,taskTime,task) VALUES ('Hannah',now(),now(),'Eat dinner');
       ?>
		
	      
    </div>
	
	<div id="footer">
        Team 20: Jalisa Broussard, Rosemary Cramblitt, Justin Oca, Eesha Singh
        <br>
        <p id="timestamp"></p>
		<script>
			let text = document.lastModified;
			document.getElementById("timestamp").innerHTML = text;
		</script>
    </div>
		
</body>
</html>