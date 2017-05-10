$(document).ready(function(){
	$('#btn').click(function(){
		var email=$('#email').val();
		var pass=$('#password').val();
		var json ={'email':email, 'password':pass};
		console.log(json);
		$.post('api/', json, 
			function(resp){
				$('#jsonM').html(JSON.stringify(resp));
		});
	});
});


		