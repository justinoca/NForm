<!DOCTYPE html>
<html lang="eng">

<head>
    <title>NForm</title>
    <meta charset="UTF-8">
    <meta name="description" content="NForm: Contact Us">
    <meta name="author" content="Justin Oca">
    <link href="contact_us.css" rel="stylesheet">
    <link rel="icon" href="nform_icon.png">
</head>

<body>
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
			<a class="active" href="contact_us.php">Contact Us</a>
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
	
    <div id='logo'>
        <figure>
            <a href="phase6.php">
            <img src="logo.png" alt="Nform Logo"></a>
        </figure> 
    </div>
       

    <div id="about">
        <h2>About Us</h2>
        <p>NForm is a calendar-style website that will allow users to view their upcoming meetings, 
            deadlines, and events for the day. It was created by a group of UT students during the 
            spring 2022 semester in order to help organize and keep track of their schedules.</p>

        <table>
            <tr style="height: 130px;">
                <td style="width:400px"><p><name>Jalisa Broussard</name> is a senior Sociology and Computer Science major at UT. During her free time, she enjoys movies, music, and dance.</p></td>
                <td style="text-align: center;"><img src="profilepics/jalisa.jpg" width="120px" alt="Jalisa"></td>
                <td style="text-align: center;"><a href="mailto:jbroussard@utexas.edu">jbroussard@utexas.edu</a></td>
            </tr>
            <tr style="height: 130px;">
                <td><p><name>Rosemary Cramblitt</name> is a junior MIS major at UT. Her hobbies are reading, crocheting, and hiking.</p></td>
                <td style="text-align: center;"><img src="profilepics/rosie.jpg" width="120px" alt="Rosie"></td>
                <td style="text-align: center;"><a href="mailto:rkcramblitt@utexas.edu">rkcramblitt@utexas.edu</a></td>
            </tr>
            <tr style="height: 130px;">
                <td><p><name>Justin Oca</name> is a junior Mechanical Engineering major at UT. During his free time, he likes to make music and spend time with friends</p></td>
                <td style="text-align: center;"><img src="profilepics/justin.jpg" width="120px" alt="Justin"></td>
                <td style="text-align: center;"><a href="mailto:justinoca@utexas.edu">justinoca@utexas.edu</a></td>
            </tr>
            <tr style="height: 130px;">
                <td> <p><name>Eesha Singh</name> is a senior Mathematics major at UT. Her hobbies include ping pong, watching movies, and painting.</p></td>
                <td style="text-align: center;"><img src="profilepics/eesha.jpg" width="120px" alt="Eesha"></td>
                <td style="text-align: center;"><a href="mailto:eesha.singh4@gmail.com">eesha.singh4@gmail.com</a></td>
            </tr>
        </table>

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