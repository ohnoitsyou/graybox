/*
function is invoked when a user clicks on the lookup button in the html page
this function creates an asynchronous Ajax request to retrieve the full-form of a
user-given abbreviation
*/
function extendRental(transactionID, inventoryID){
	//create a new Ajax request with URL pointing to extend.php
	var confirmTrue = confirm("Do you want to extend your rental for 5 days for $2?");
	if (confirmTrue){
		new Ajax.Request( "extend.php", 
	{ 
		parameters: {txID:transactionID,invID:inventoryID},
		onSuccess: extender
	} 
	);
}
}

/*
the response from the server, after the request is processed completely is
displayed as the value of the div-element with the id 'result'
*/
//note: ajax MUST be in the parameter list of this function always
function extender(ajax){
	var r =ajax.responseText;
	console.log(r);
	$("dueDate").innerHTML = r;
}

function paraHover() {
	document.getElementById("para1").style.color = "red";
}

function coverHover(imgID) {
	document.getElementById(imgID).style.border = "red";
	
}
}
