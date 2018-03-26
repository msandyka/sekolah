$(document).ready(function() {
	var username = $('#usn').val();
	var password = $('#pwd').val();
	$.ajax({
		url: base_url'login',
		type: 'POST',
		data: {
				uname: username,
				passw: password
			},
	})
	.done(function(result) {
		if(result=='logedIn'){
			alert('logedIn')
		}else{
			alert('wrong username and/or password')
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
});