function extendRental(transactionID, inventoryID){
	//create a new Ajax request with URL pointing to extend.php
	new Ajax.Request( "extend.php", 
	{ 
		parameters: {txID:transactionID,invID:inventoryID},
		onSuccess: extender
	} 
	);
}

function extender(ajax){
	var r =ajax.responseText;
	console.log(r);
	$("dueDate").innerHTML = r;
}

function paraHover(){
	var parElement=document.getElementbyId("para1").style;
	parElement.color="red";
	parElement.fontWeight="bold";
}

function coverHover(){
	var imgElement=document.getElementbyID("img1").style;
	imgElement.bordercolor=black;
	imgElement.borderWidth="thick";

}