function filled(){
	// Get the user's input from the form.
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	


	//Check if USERNAME is valid.
	//The username must be between 6 and 10 characters long, inclusive.
	if (username.length < 6 || username.length > 10){
		alert("Invalid username or password: Username must be between 6 and 10 characters long, inclusive. ")
	}

	//The username cannot begin with a digit.
	else if (first_char(username)){
		alert("Invalid username or password: Username cannot begin with a digit.")
	}
	//The username must contain only letters and digits.
	else if (letters_numbers(username)){
		alert("Invalid username or password: Username must contain only letters and digits.")
	}



	//Check if PASSWORD is valid.
	//The password must be between 6 and 10 characters long, inclusive.
	else if (password.length < 6 || password.length > 10){
		alert("Invalid username or password: Password must be between 6 and 10 characters long, inclusive.")
	}

	//The password must have at least one lower case letter, at least one upper case letter, and at least one digit.
	else if (one_of_everything(password)){
		alert("Invalid username or password: Password must have at least one lower case letter, one upper case letter, and at least one digit.")
	}

	//The password and the repeat password must match.
	else{
    alert("User validated")
    }
}


function first_char(str){
	var char1 = str.charAt(0)
	if (!isNaN(char1)) {
    return true
	}
}

// Function to check letters and numbers
function letters_numbers(str){
	if (!str.match("^[A-Za-z0-9]+$")){
		return true
	}
}

function one_of_everything(str){
	var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,10}$/;
	if (!str.match(passw)){
		return true
	}

}
