$("#brickSelect").on('change', function(){
  //alert($(this).find(':selected').val());
  var price = $(this).find(':selected').attr('quantity');
  $("#price").html(price);
});
function getTotal(){
  var q = parseFloat($('#quantity').val());
  var price = parseFloat($("#brickSelect").find(':selected').attr('quantity'));
  if(isNaN(price)){
    price = 0;
  }
  var total = q*price;
  $("#total").html(total);
  $("pay").html(total);
  //alert("Price: "+price+". Quantity: "+q);
  
}