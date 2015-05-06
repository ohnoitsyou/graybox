/*Christian Nieva
    5/6/15
	IS448
	Dr. Sampath
	Login - check username and password fields
    */

function displayWelcome() {
// This had an alert in it. I removed it because it was annoying
}


function checkInfo() {
    var uName = document.getElementById("username").value;
    var pass = document.getElementById("password").value;

	var pattern1 =  /^[a-z0-9_-]{3,16}$/;
	var result = pattern1.test(uName);
    var result = pattern1.test(pass);
	
	
    if (result==false) {
        alert("Username and password field is empty. Please enter your username and password!");
        document.getElementById("username").select();
        document.getElementById("password").select();
		return false;
    }
}
