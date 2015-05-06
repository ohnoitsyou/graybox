
function validateUsername() {
    var usernameValidation =  document.getElementById("username").value;
	new Ajax.Request("registration_usercheck.php",
	{ 
		method: "post", 
		parameters: {username:usernameValidation},
		onSuccess: usernameExistence
	} 
	);

}

function usernameExistence(ajax){
    var r =ajax.responseText;
    console.log(r);
    if (r=="username available"){
        console.log('username available');
        $("userbox").style.backgroundColor="green";
        $("userbox").style.color="white";
        $("userbox").innerHTML =r;
        }
    else if (r=="username taken"){
        console.log('username taken');
        $("userbox").style.backgroundColor="red";
        $("userbox").style.color="white";
        $("userbox").innerHTML =r;
        }
        
}

function validatePassword(){
    console.log('running');
	/*
    var pword_Validation =  document.getElementById("pword").value;
    var pwordcheck_Validation =  document.getElementById("pwordcheck").value;
	new Ajax.Request( "registration.php", 
	{ 
		method: "post", 
		parameters: {pwordcheck:pwordcheck_Validation},
		onSuccess: pwordEquality
	} 
	);*/
    
    var password1 = document.getElementById("pword").value;
    var password2 = document.getElementById("pwordcheck").value;
    console.log(password1);
    
    if(password1 == password2) {
        console.log('passwords match');
        $("pword").style.backgroundColor = "green";
        $("pwordcheck").style.backgroundColor = "green";
    } else {
        console.log('passwords dont match');
        $("pword").style.backgroundColor = "red";
        $("pwordcheck").style.backgroundColor = "red";        
    }
}
/*
function pwordEquality(ajax){
    var r =ajax.responseText;
	var match ="passwords dont match";
    
    if (r=="passwords match"){
        $("passbox").style.backgroundColor="red";
        $("passbox").style.color="white";
        $("passbox").innerHTML =r;
        }
    else {
        $("passbox").style.backgroundColor="green";
        $("passbox").style.color="white";
        $("passbox").innerHTML =match;
        }
        
}
*/
function chkString() {
    var fname =  document.getElementById("fname").value;
    var lname =  document.getElementById("lname").value;
    var email =  document.getElementById("email").value;
    var username =  document.getElementById("username").value;
    
    var pword_Validation =  document.getElementById("pword").value;
    var pwordcheck_Validation =  document.getElementById("pwordcheck").value;

    var address =  document.getElementById("address").value;
    var city =  document.getElementById("city").value;
    var zip =  document.getElementById("zip").value;
    //RegEx will be used to test these VARs
    
    var card_type = document.getElementById("card_type").value;
    var card_NUM =  document.getElementById("card_NUM").value;
    var card_EXP =  document.getElementById("card_EXP").value;
    var card_name =  document.getElementById("card_name").value;
    var card_ccv =  document.getElementById("card_ccv").value;
    var card_zip =  document.getElementById("card_zip").value;
   
    //RegEx patterns for textbox validation
        var fnamePattern = /^[a-z \-]+$/i;
        var lnamePattern = /^[a-z \-]+$/i;
        var emailPattern = /^[a-z0-9!#$%&'*+\/=?\^_`{|}~\-]+(?:\.[a-z0-9!#$%&'*+\/=?\^_`{|}~\-]+)*@(?:[a-z0-9](?:[a-z0-9\-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum|edu)\b$/i;
        var usernamePattern = /^[a-z._0-9]+$/i;
        var addressPattern = /^[a-z0-9\s,'\-]*$/i;
        var cityPattern = /^[a-z\-]+$/i;
        var zipPattern = /^[0-9]{5}$/;
        var card_NUMPattern = /^[0-9]{16}$/;
        var card_EXPPattern = /^(0[1-9]|1[012])\/\d{2}$/;
        var card_namePattern = /^[a-z ,.'-]+$/i;
        var card_ccvPattern = /^[0-9]+$/;
        var card_zipPattern = /^[0-9]{5}$/;

    //Checks VARs against RegEx patterns
    var fnameCheck = fnamePattern.test(fname);
    var lnameCheck = lnamePattern.test(lname);    
    var emailCheck = emailPattern.test(email);
    var usernameCheck = usernamePattern.test(username);
    
    var addressCheck = addressPattern.test(address);
    var cityCheck = cityPattern.test(city);    
    var zipCheck = zipPattern.test(zip);
    
    var card_NUMCheck = card_NUMPattern.test(card_NUM);
    var card_EXPCheck = card_EXPPattern.test(card_EXP);
    var card_nameCheck = card_namePattern.test(card_name);
    var card_ccvCheck = card_ccvPattern.test(card_ccv);
    var card_zipCheck = card_zipPattern.test(card_zip);
    
//if statements with coorespinding alerts, reselect if patternCheck=false
    //
    // fname , lname , email , username
    if (pword_Validation!=pwordcheck_Validation )
        {
        alert("Your passwords do not match.");
        document.getElementById("pword").select();
        return false;     
        }  
    else if (!fname || fnameCheck==false )
        {
        alert("You must provide a valid first name. (Letters, spaces and hyphens only) ");
        document.getElementById("fname").select();
        return false;     
        }
    else if (!lname || lnameCheck==false )
        {
        alert("You must provide a valid last name. \n(Letters, spaces and hyphens only) ");
        document.getElementById("lname").select();
        return false;     
        }
    else if (!email || emailCheck==false )
        {
        alert("You must provide a valid email address.");
        document.getElementById("email").select();
        return false;     
        }
    else if (!username || usernameCheck==false )
        {
        alert("You must provide a username to register.\nUsername must be 8-20 characters long. \nIt can only contain letters, digits, (.) and (_).");
        document.getElementById("username").select();
        return false;     
        }
    //address city zip
    else if (!address || addressCheck==false )
        {
        alert("You must provide a valid address.");
        document.getElementById("address").select();
        return false;     
        }
    else if (!city || cityCheck==false )
        {
        alert("You must provide a valid city.");
        document.getElementById("city").select();
        return false;     
        }
    else if (!zip || zipCheck==false )
        {
        alert("You must provide a valid postal zip code.");
        document.getElementById("zip").select();
        return false;     
        }
    // card_type , card_NUM , card_EXP , card_name , card_ccv , card_zip
    else if (!card_type)
        {
        alert("You must provide a card type.");
        document.getElementById("card_type").select();
        return false;     
        }
    else if (!card_NUM || card_NUMCheck==false )
        {
        alert("You must provide a valid card number.");
        document.getElementById("card_NUM").select();
        return false;     
        }
    else if (!card_EXP || card_EXPCheck==false )
        {
        alert("You must provide a card expiration date.");
        document.getElementById("card_EXP").select();
        return false;     
        }
    else if (!card_name || card_nameCheck==false )
        {
        alert("You must provide a valid card name.");
        document.getElementById("card_name").select();
        return false;     
        }
    else if (!card_ccv || card_ccvCheck==false )
        {
        alert("You must provide a valid ccv for your credit card.");
        document.getElementById("card_ccv").select();
        return false;     
        }
    else if (!card_zip || card_zipCheck==false )
        {
        alert("You must provide a valid zip code for your credit card.");
        document.getElementById("card_zip").select();
        return false;     
        }  
        
//return true, else statement    
    else{
        return true;
        }

}
