$(document).ready(function(){
	
	var js ={};
	var arg;
	var gid;
	var con;
	

	//create function
	$('body').on('click', '#reg', function () {
		$('input').each(function()
		{
			var attr = $(this).attr('id');
			js[attr] = $('#'+attr).val();
		});
		js['arg']="user_create";
		
		console.log("sent object");
		console.log(js);
		$.post('../admin/api/create/', js, function(resp){	
		});
			window.location.href="../sign.html";
	});
	
	$('body').on('click', '#sign_btn', function () {
		var email=$('#username').val();
		var pass=$('#password').val();
		var js={'email':email, 'password': pass};
		console.log("sent object");
		console.log(js);
		$.post('api/', js, function(resp){	
			console.log(resp);
			 if(resp.right==1)
			 {
			 	window.location.href="admin/admin.php";	
			 }
			 if(resp.right==0)
			 {
			 	window.location.href="submit.html";
			 }
		});

		//	window.location.href="../sign.html";
	});
	

});


		