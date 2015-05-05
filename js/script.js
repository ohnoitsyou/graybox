function addToCart(id) {
  console.log(id); 
  new Ajax.Request('api/addToCart.php', {
    parameters: {
      'id': id
    },
    onSuccess: function(resp) {
      console.log('success');
      console.log(resp.responseText);
    },
    onFailure: function(resp) {
      console.log('error');
      console.log(resp.responseText);
    } 
  });
}
