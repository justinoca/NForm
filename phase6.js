//index starts at the beginning, 0
var index = 0

//Pictures should be displayed for 3 seconds 
var time = 3000;	

//Create an array in JavaScript that stores all the images
var imgArray = new Array("weather.jpg","texas.png","add_task.jpg") 
	

function slideshow(){
	document.getElementById("myPicture").src = imgArray[index]

	// Check If Index Is Under Max
	if(index < imgArray.length - 1){
	  // Add 1 to Index
	  index++; 
	} else { 
		// Reset Back To O
		index = 0;
	}
	run_slideshow = setTimeout("slideshow()", time) 
	
}


function end() {
  clearTimeout(run_slideshow)
}

function start() {
  slideshow()
}

function rating(){
	num = document.getElementById("number").value
	if (num < 2) {
		alert("Oh no! Please click our Contact Us tab to let us know what we can improve on.")
	}
	else if (num < 4) {
		alert("Thank you for your feedback, we'd love to hear more! Shoot us an email with any ideas you may have.")
	}
	else{
		alert("Thank you for your positive feedback! Have a great day!")
	}
	
}

