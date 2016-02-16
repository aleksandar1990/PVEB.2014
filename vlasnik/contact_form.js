$(document).ready(function() {
	$("#submit").click(function() {
		
	var chassis = $("#chassis").val();
	var buy = $("#buy").val();
	var rent = $("#rent").val();
	
	$("#returnmessage").empty(); // To empty previous error/success message.
	
	// Checking fields
	if (chassis == '' || !$.isNumeric(buy) || !$.isNumeric(rent))
		{
	     alert("Error: Ivalid input!");
	} 
	
	});
});