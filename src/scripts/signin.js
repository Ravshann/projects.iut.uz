
$(document).ready(function () {
	$('#logo').addClass('animated fadeInDown');
	$("input:text:visible:first").focus();
});
$('#username').focus(function() {
	$('label[for="username"]').addClass('selected');
});
$('#username').blur(function() {
	$('label[for="username"]').removeClass('selected');
});
$('#password').focus(function() {
	$('label[for="password"]').addClass('selected');
});
$('#password').blur(function() {
	$('label[for="password"]').removeClass('selected');
});

$(document).ready(function(){
	$('#btn').click(function(){
		var email=$('#email').val();
		var pass=$('#password').val();
		var json ={'email':email, 'password':pass};
		console.log(json);
		$.post('../api/', json, 
			function(resp){
				console.log(resp);
				console.log(resp.exists);
				if(!resp.exists)
					$('#err').html("username or password is wrong");
				else
					{
						//$.post("../api/session/", function(resp){});
					}
				if(resp.right==1){
				 	window.location.href = '../admin/admin.html';
				}
				/*if(resp.exists){
					window.location.href=""
				}*/
		});
	});
});
