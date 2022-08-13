<?php 
// verify username and password

// Get the user\'s input from the form.
$username  = $_GET["username"];
$password = $_GET["password"];
      

//Validate username 
$special = preg_match('@[^\w]@', $username);	


// Validate password 
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);			



//Check if USERNAME is between 6 and 10 characters long, inclusive.
if (strlen($username) < 6 || strlen($username) > 10){
  echo "Invalid Username: Username must be between 6 and 10 characters long, inclusive.";
  }
  
//Check if username cannot begin with a digit.
else if (is_numeric($username[0])){
  echo "Invalid Username: Username cannot begin with a digit.";
}

//The username must contain only letters and digits.
else if ($special){
  echo "Invalid Username: Username must contain only letters and digits.";
}
          


//Check if Password is at least 8 characters in length and should include at least one upper case letter, one number, and one special character
else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
  echo "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character";
  }
  
else{	
  //Create Cookie
  setcookie('loggedIn', $username, time()+ 3600, "/");
  
}


if (isset($_COOKIE['loggedIn'])){
  


$server = $_GET["server"];
$user = $_GET["user"];
$pwd = $_GET["pwd"];
$dbName = $_GET["dbName"];

$pwd = urldecode($pwd);

$mysqli = new mysqli($server, $user, $pwd, $dbName);
if ($mysqli->connect_errno) {
      die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
   } 

$mysqli->select_db($dbName) or die($mysqli->error);

$username = $_GET['username'];
$password = $_GET['password'];
// Escape User Input to help prevent SQL Injection
$username = $mysqli->real_escape_string($username);
$password = $mysqli->real_escape_string($password);

#3 outcomes: username and password are the same, username has diff password, or username is not in table
$query = "SELECT * FROM passwd WHERE username = '$username'";
$result = $mysqli->query($query) or die($mysqli->error);
if (!$result) {
  die("Query failed: ($mysqli->error <br> SQL command = $command");
  }
elseif ($result->num_rows > 0) {
  #username is in table
  $pass_match = False;
  while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($row['password'] == $password) {
      $pass_match = True;
      break;
    }
  }
  if ($pass_match) {
    echo "User and password confirmed";
  }
  else{
    #update row
    $command = "UPDATE passwd SET password = '$password' where username = '$username'";
    $update_result = $mysqli->query($command);
    if (!$update_result) {
      die("Query failed: ($mysqli->error <br> SQL command = $command");
      }
    else{
      echo "Password changed";
    }
  }
}
else{
  #username is not in table, insert username and password
  $command = "INSERT INTO passwd VALUES ('$username','$password')";
  $insert_result = $mysqli->query($command);
  if (!$insert_result) {
    die("Query failed: ($mysqli->error <br> SQL command = $command");
    }
  else{
    echo "New user registered";
  }
  
}

}

 ?>