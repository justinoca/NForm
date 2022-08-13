<!DOCTYPE html>

<html lang="en">


<head>
   <title>Sign Up</title>
   <meta charset="UTF-8">
   <meta name="description" content="Sign Up page for NForm">
   <meta name="author" content="Rosemary Cramblitt">

   <link rel="icon" href="nform_icon.png">
   <link href="phase6.css" rel="stylesheet">
   <script src="sign_up.js" > </script>
</head>
	<body>
	  <div class="container">

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
		<!--Changes the Nav Bar depending on if User is Log In-->
        <?php 
          if(isset($_COOKIE['loggedIn'])){
            $username = $_COOKIE["loggedIn"];
            echo "<a href='log_out.php'>Log Out</a>";
          }
          else{
            echo "<a class='active' href='sign_up.php' class='active'>Sign Up/Log In</a>";
            
          }
		?>
			</div>
		</div>
		
		<div id="logo">
          <figure>
            <a href="phase6.php"><img src="logo.png" alt="Nform Logo"></a>
          </figure>
        </div>


        <script language = "javascript" type = "text/javascript">

                  //Browser Support Code
                  function ajaxFunction(server,user,pwd,dbName){
                     var ajaxRequest;  // The variable that makes Ajax possible!
                     
                     ajaxRequest = new XMLHttpRequest();
                     
                     // Create a function that will receive data sent from the server and will update
                     // the div section in the same page.
                     
                     ajaxRequest.onreadystatechange = function(){
                        if(ajaxRequest.readyState == 4){
                           var ajaxDisplay = document.getElementById('ajaxDiv');
                           ajaxDisplay.innerHTML = ajaxRequest.responseText;
                        }
                     }
                     
                     // Now get the value from user and pass it to server script.
                     
                     var username = document.getElementById('username').value;
                     var password = document.getElementById('password').value;
                     var queryString = "?username=" + username ;
                  
                     queryString +=  "&password=" + password + "&server=" + server + "&user=" + user + "&pwd=" + pwd + "&dbName=" + dbName;
                     
                     ajaxRequest.open("GET", "query.php" + queryString, true);
                     ajaxRequest.send(null);
                  }

            </script>
            
        <h3>Log In</h3>
        <form method = "POST" name = 'myForm'>

              <?php
         
                $server = "spring-2022.cs.utexas.edu";
                $user = "cs329e_bulko_eeshas4";
                $pwd = 'erode*hearth$Tremor';
                $dbName = "cs329e_bulko_eeshas4";

                // encode the password to allow special characters such as ampersand to be passed in GET
                $pwd = urlencode($pwd);


                   echo "<table><tr><td>Username:</td>";
                echo "<td> <input type = 'text' id = 'username' size = '20' required/> </td>";
                   echo "</tr> <tr>";
                echo "<td>Password:</td>";
                   echo "<td> <input type = 'password' id = 'password' size = '20' required/> </td>";
                   echo "</tr> ";
                   echo " </table>";
                echo "<input type = \"button\" onclick = \"ajaxFunction('$server','$user','$pwd','$dbName')\" value = \"Submit\"/> <br><br> ";
                    
              ?>
            </form>
      <div id = 'ajaxDiv'></div>
	
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