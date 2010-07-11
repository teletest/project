//This is where the magic happens


//this first bit of code makes sure that the code inside
//fires when the dom is ready
window.addEvent('load', function() {
// $(document).ready(function() { 

	//first lets add an event to our user_name input
	$('calendar_name').addEvent('keyup',function(){
	//   $("calendar_name").keyup(function() { 
	    alert("hello");
		//$('user_name') will grab any element with the ID of user_name
		//We added the event keyup which will fire our event every time
		//a user releases a key inside our user_name input field
		
		//lets only fire the event after the user has inputed more than 3 characters
		
		//first, grab the value of our user_name input
		var input_value = this.value;
		alert(input_value);
		//check if the length of the user_name input value is > 3
		if(input_value.length > 1){
		
			//build the request
			new Request.JSON({
				url: "{site_url}index.php/projects/live_validation", 
				onSuccess: function(response){
					
					//did it return as good, or bad?
					if(response.action == 'success'){
					
						//username is available
						$('calendar_name').removeClass('error');
						$('calendar_name').addClass('success');
						
						//update the response p
						$('response').set('html','<em>'+response.calendar_name+'</em> is Available');
						
						//activate the button
						$('submit_button').disabled = false;
						$('submit_button').removeClass('disabled');
						$('submit_button').addClass('blue');
						
					}else{
					
						//username is taken
						$('calendar_name').removeClass('success');
						$('calendar_name').addClass('error');
						
						//update the response p
						$('response').set('html','<em>'+response.calendar_name+'</em> is not available. Please choose another!');

						//disable the button
						$('submit_button').disabled = true;
						$('submit_button').removeClass('blue');
						$('submit_button').addClass('disabled');
						
					
					}
					
				}
			}).get($('calendarForm'));

		}
		
		//lets hide the response p if the user mouses off the input and it's empty
		$('calendar_name').addEvent('blur',function(e){
		
			if(this.value == ''){
			
				$('calendar_name').removeClass('success');
				$('calendar_name').removeClass('error');
				$('response').set('html','');

				$('submit_button').disabled = true;
		    	$('submit_button').removeClass('blue');
		    	$('submit_button').addClass('disabled');
				
			}
		
		});
		
	});

});