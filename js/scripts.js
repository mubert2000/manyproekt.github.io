$(document).ready(function() {
  // Create two variable with the names of the months and days in an array
  var monthNames = [ "January", "February", "March", "April", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ]; 
  var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

  // Create a newDate() object
  var newDate = new Date();
  // Extract the current date from Date object
  newDate.setDate(newDate.getUTCDate());
  // Output the day, date, month and year   
  $('#Date').html(/*dayNames[newDate.getUTCDay()] + " " + */monthNames[newDate.getMonth()] + ' ' + newDate.getDate() + ', ' + newDate.getFullYear());
  
  setInterval( function() {
	  // Create a newDate() object and extract the seconds of the current time on the visitor's
	  var seconds = new Date().getUTCSeconds();
	  // Add a leading zero to seconds value
	  $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	  },1000);
	  
  setInterval( function() {
	  // Create a newDate() object and extract the minutes of the current time on the visitor's
	  var minutes = new Date().getUTCMinutes();
	  // Add a leading zero to the minutes value
	  $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	  },1000);
	  
  setInterval( function() {
	  // Create a newDate() object and extract the hours of the current time on the visitor's
	  var hours = new Date().getUTCHours();
		var ampm	= 'AM';
	if(hours > 12)
	{
		hours -= 12;
		ampm = 'PM';
	}
		else if(hours == 12)
	{
		ampm = 'PM';	
	};

	  // Add a leading zero to the hours value
	  $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	  
	  $("#ampm").html(ampm);
	  }, 1000);	
});