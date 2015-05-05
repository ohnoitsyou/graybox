function addToCart(id) {
  new Ajax.Request('api/addToCart.php', {
    parameters: {
      itemID:  id
    },
    onSuccess: function(resp) {
      if(resp.responseText == "-1") {
        alert("Item already in cart");
      }
      updateCartCount();
    },
    onFailure: function(resp) {
      console.log('error');
      console.log(resp.responseText);
    } 
  });
}

function removeFromCart(id) {
  new Ajax.Request('api/removeFromCart.php', {
    parameters: {
      itemID: id
    },
    onSuccess: function(resp) {
      updateCartCount();
      var windowPath = location.pathname;
      var path = windowPath.split('/');
      if(path[path.length - 1] == 'cart2.php') {
        updateCartDisplay("cart_"+id); 
        updateTotal();
      }
    }
  });
}

function updateCartCount() {
  new Ajax.Request('api/cartCount.php',{
    onSuccess: function(resp) {
      $$('.items_in_cart')[0].innerHTML = "(" + resp.responseText + ")";
    }
  });
}

function updateCartDisplay(id) {
  document.getElementById(id).remove();
}

function updateTotal() {
  console.log('running updateTotal');
  var prices = document.getElementsByClassName('price');
  var totalCost = document.getElementById('totalCost');
  var runningTotal = 0;
  for(var i = 0; i < prices.length; i++) {
    runningTotal += parseFloat(prices[i].innerHTML);
  }
  totalCost.innerHTML = runningTotal.toFixed(2);
}

// Augment the DOM to support removing of a node in a sane way
Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = 0, len = this.length; i < len; i++) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}

//when mouse over big image
function bigImg(x) {
    x.style.height = "800px";
    x.style.width = "500px";
}


//when mouse off normal image
function normalImg(x) {
    x.style.height = "400px";
    x.style.width = "100px";
}

//grabs data to show images- remember need to "onLoad" (on loading page)

function grab_data(){
	//event handler fn
		//functionName contains code to run when request is complete
	new Ajax.Request("api/new_releases_data.php",{ onSuccess: function(data) {$$("upcoming").update(data)}});
}
