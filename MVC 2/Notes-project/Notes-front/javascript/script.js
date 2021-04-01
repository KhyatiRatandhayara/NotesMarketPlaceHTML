$(document).ready(function() {
        for (i = 1; i <9 ; i++) {
            for (j = 5; j >= 1 ; j--) {
                $('.rate'+i+' .rate').append('<input type="radio" id="s_'+i+'_'+j+'" name="rate'+i+'" value="5" /><label for="s_'+i+'_'+j+'" title="text">5 stars</label>');
            }
        }
	});
$(".toggle-password").click(function() {
    
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

$(".btn-nav-login").click(function() {
   window.location.href = "login.html";
});

$(".btn-note-details").click(function(){
    window.location.href="login.php";
});
$(".radiofree").change(function() {
    $("#sell-price").attr("disabled", true);
    
});  
$(".radiopaid").change(function() {
    $("#sell-price").attr("disabled", false);
    
});  
    
//function sellfree(){
//   
//}
//function sellpaid(){
//     document.getElementById("sell-price").disabled=false;
//} 
