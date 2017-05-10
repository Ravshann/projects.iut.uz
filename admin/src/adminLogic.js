$(document).ready(function(){
	
	var js ={};
	var arg;
	var gid;
	var con;
	//delete function
	$('body').on('click', '#delete_btn', function () {
		$('input.userCheckbox:checkbox:checked').each(function () {
		var chVal = $(this).attr('id');
		console.log();
		var ar = chVal.split(" ");
		var j = {'name':ar[0], 'id': ar[1]};

		$.ajax({
		    type: "delete",
		    url: "api/"+arg,
		    data: j,
		    success: function(resp){
		    	console.log(resp);
		    	if(resp.status)
		    		{$("#"+arg).trigger('click');}
		    	else
		    		console.log("something went wrong");
		    	}
		    });
		});
	});	

	


	//done button function
	$('body').on('click', '#done_btn', function () {
		$('input').each(function()
		{
			var attr = $(this).attr('id');
			js[attr] = $('#'+attr).val();
		});
		js['arg']=arg;
		js['right']=$('#user_type').val();
		js['project_type']=$('#project_type').val();
		js['id']=gid;  
		console.log("sent object");
		console.log(js);
		$.post('api/modify/', js, function(resp){
			console.log("this is response");
			console.log(resp);
			if(resp.status)
			 	{if(arg=="user_modify")
			 		$("#users").trigger('click');
			 	else $("#projects").trigger('click');}
			 else
			  	console.log("something went wrong");
		});
	});	

	//modify function
	$('body').on('click', '#modify_btn', function () {
		$('input.userCheckbox:checkbox:checked').each(function () {
		var id =$(this).closest("td").siblings("td.1").text();
		gid=id;
		var name=$(this).closest("td").siblings("td.2").text();
		var sn_t= $(this).closest("td").siblings("td.3").text();
		var	em_pu= $(this).closest("td").siblings("td.4").text();
		var p_pd= $(this).closest("td").siblings("td.5").text();
		var r_ra=$(this).closest("td").siblings("td.6").text();

		console.log("modify menu pressed");
	 	if(arg=="projects")
	 	{
			$("#bigContainer").html("");
 			$("#bigContainer").append('<h1 class="page-header" id="page_title">Modify Project</h1>');
			var form = '<div class="form-group" id="myForm"> <label class="col-md-8 control-label" for="name">Name</label> <div class="col-md-8"> <input id="project_name" name="name" type="text" placeholder="" class="form-control input-md" required="" value='+name+'></div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="project_type">Project Type</label> <div class="col-md-8"> <select id="project_type" name="user_type" class="form-control"> <option value="-1">Select</option> <option value="Android application">Android application</option> <option value="Web application">Web application</option> <option value="iOS application">iOS application</option> <option value="Desktop application">Desktop application</option> <option value="Other">Other</option> </select> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="name">Posted Username</label> <div class="col-md-8"> <input id="posted_user_name" name="name" type="text" placeholder="Enter user name" class="form-control input-md" required="" value='+em_pu+'> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="posted_time">Posted Time</label> <div class="col-md-8"> <input id="posted_time" name="name" type="text" placeholder="yyyy-mm-dd" class="form-control input-md" required="" value='+p_pd+'> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="rate">Rate</label> <div class="col-md-8"> <input id="rate" name="rate" type="text" placeholder="0-10" class="form-control input-md" required="" value='+r_ra+'> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="done"></label> <div class="col-md-8"> <button id="done_btn" name="create_btn" class="btn btn-success">Done</button> </div> </div> </fieldset>';		
			$("#bigContainer").append(form);
			arg= "project_modify";
		}
		if(arg=="users")
	 	{
			$("#bigContainer").html("");
 			$("#bigContainer").append('<h1 class="page-header" id="page_title">Modify User</h1>');
			var form = '<div class="form-group"> <label class="col-md-8 control-label" for="name">Name</label> <div class="col-md-8"> <input id="name" name="name" type="text" placeholder="Enter name" class="form-control input-md" required="" value='+name+'> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="name">Last Name</label> <div class="col-md-8"> <input id="last_name" name="name" type="text" placeholder="Enter name" class="form-control input-md" required="" value='+sn_t+'> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="email">Email</label> <div class="col-md-8"> <input id="email" name="email" type="text" placeholder="Enter email" class="form-control input-md" required="" value='+em_pu+'> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="password">Password</label> <div class="col-md-8"> <input id="password" name="password" type="text" placeholder="Enter a password" class="form-control input-md" required="" value='+p_pd+'> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="user_type">User Type</label> <div class="col-md-8"> <select id="user_type" name="user_type" class="form-control"> <option value="0" id = "s">Simple</option> <option value="1" id = "a">Admin</option> </select> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="modify"></label> <div class="col-md-8"> <button id="done_btn" name="create_btn" class="btn btn-success">Done</button> </div> </div>';
			$("#bigContainer").append(form);
			arg= "user_modify";
		}
		});
	});	

	//open requst
	$('body').on('click', '#read_req', function () {
		$('input.userCheckbox:checkbox:checked').each(function () {
		
		var id =$(this).closest("td").siblings("td.1").text();
		var su=$(this).closest("td").siblings("td.2").text();
		var e= $(this).closest("td").siblings("td.3").text();
		var	ui= $(this).closest("td").siblings("td.4").text();
		console.log("open menu pressed");
		var last = '<h2>Request with ID:'+id+' </h3> <p><strong>Subject:</strong> '+su +'</p> <strong>Email of sender:</strong> '+e+'</p> <strong>Sender User ID:</strong> '+ui+'</p><strong>Message: </strong></p><p class="limit">'+con+'</p>';
		$("#bigContainer").html("");
	 	$("#bigContainer").append(last);
	 	$(".limit").css({"overflow-y": "hidden", "white-space": "nowrap", "width": "105%",  "max-width": "calc(30em * 0.5)" });
		});
	});


	//retrieving from database
	$('#users').click(function(){
		var json = {"message": 1};
		console.log(json);
		
		//getting users
		$.post('api/', json, function(resp){
	 		console.log(resp);
	 		$("#bigContainer").html("");
	 		$("#bigContainer").append('<h1 class="page-header" id="page_title">Users</h1>');
		  	$("#bigContainer").append(
	  			$('<div/>', {'class': 'table-responsive'}).append(
		        	$('<table/>', {'class': 'table table-striped'}).append(
	            		).append('<thead/>')
	            	)
	            );
		  	var name = "Name";
            var ln = "Last Name";
            var id="ID";
            var email="Email";
            var pass="Password";
            var right="Admin";
            
            var markup = "<tr><th>Select</th><th>" + id + "</th><th>" + name + "</th><th>" + ln + "</th><th>" + email + "</th><th>" + pass + "</th><th>" + right + "</th><tr>";
            $("thead").append(markup);
            $("table").append("<tbody/>");
		  	var i=0;
		  	while(i<resp.count)
		  	{
			  	var name=resp[i].name;
	            var ln=resp[i].last_name;
	           	var e=resp[i].email;
	            var id=resp[i].id;
	            var pass=resp[i].password;
	            var right=resp[i].right;
	            var s="user "+id; 
	           	var markup = "<tr id='"+s+"'><td><input type='checkbox' name='record' class='userCheckbox' id='"+name+" "+id+"'></td><td class='1'>" + id + "</td><td class='2'>" + name + "</td><td class='3'>" + ln + "</td><td class='4'>" + e+ "</td><td class='5'>" + pass + "</td><td class='6'>" + right + "</td><td>";
	            $("thead").append(markup);
	            i++;
		  	}
   			var del=	'<button type="button" class="btn btn-primary" id="delete_btn">Delete</button>';			
   			$("#bigContainer").append(del);
			var mod=	'<button type="button" class="btn btn-primary" id="modify_btn">Modify</button>';			
   			$("#bigContainer").append(mod);
   			
   			
   			arg ="users";
   			
		 });
		
	});
	
	//retrieving projects from database
	$('#projects').click(function(){
		var json = {"message": 2};
		console.log(json);
		 $.post('api/', json, function(resp){
	 		console.log(resp);
	 		$("#bigContainer").html("");
	 		$("#bigContainer").append('<h1 class="page-header" id="page_title">Projects</h1>');
		  	$("#bigContainer").append(
	  			$('<div/>', {'class': 'table-responsive'}).append(
		        	$('<table/>', {'class': 'table table-striped'}).append(
	            		).append('<thead/>')
	            	)
	            );
		  	var name = "Name";
            var type = "Type";
            var id="ID";
            var pd="Posted Date";
            var pu="Posted User";
            var rate="Rate";
            
            var markup = "<tr><th>Select</th><th>" + id + "</th><th>" + name + "</th><th>" + type + "</th><th>" + pu + "</th><th>" + pd + "</th><th>" + rate + "</th><tr>";
            $("thead").append(markup);
            $("table").append("<tbody/>");
		  	var i=0;
		  	while(i<resp.count)
		  	{
			  	var name=resp[i].name;
	            var type=resp[i].type;
	           	var pu=resp[i].pu;
	            var id=resp[i].id;
	            var rate=resp[i].rate;
	            var pd=resp[i].pd;
	            
	           	var markup = "<tr><td><input type='checkbox' name='record' class='userCheckbox' id='"+name+" "+id+"'><td class='1'>" + id + "</td><td class='2'>" + name + "</td><td class='3'>" + type + "</td><td class='4'>" + pu+ "</td><td class='5'>" + pd + "</td><td class='6'>" + rate + "</td>";
	            $("thead").append(markup);
	            i++;
		  	}

		  	var needed=	'<button type="button" class="btn btn-primary" id="delete_btn">Delete</button>';			
   			$("#bigContainer").append(needed);
   			
   			var mod=	'<button type="button" class="btn btn-primary" id="modify_btn">Modify</button>';			
   			$("#bigContainer").append(mod);
   			
   			arg='projects';
		 });
	});
	


	//create function
	$('body').on('click', '#create_btn', function () {
		$('input').each(function()
		{
			var attr = $(this).attr('id');
			js[attr] = $('#'+attr).val();
		});
		js['arg']=arg;
		js['right']=$('#user_type').val();
		js['project_type']=$('#project_type').val(); 
		console.log("sent object");
		console.log(js);
		$.post('api/create/', js, function(resp){
			console.log("this is response");
			console.log(resp);
			if(resp.status)
				{if(arg=="user_create")$("#users").trigger('click');
			else if(arg=="project_post")$("#projects").trigger('click');}
			else
			 	console.log("something went wrong");
		});
	});

	$('#user_create').click(function(){
		console.log("create user menu pressed");
		$("#bigContainer").html("");
	 	$("#bigContainer").append('<h1 class="page-header" id="page_title">Create User</h1>');
		var form = '<div class="form-group"> <label class="col-md-8 control-label" for="name">Name</label> <div class="col-md-8"> <input id="name" name="name" type="text" placeholder="Enter name" class="form-control input-md" required=""> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="name">Last Name</label> <div class="col-md-8"> <input id="last_name" name="name" type="text" placeholder="Enter name" class="form-control input-md" required=""> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="email">Email</label> <div class="col-md-8"> <input id="email" name="email" type="text" placeholder="Enter email" class="form-control input-md" required=""> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="password">Password</label> <div class="col-md-8"> <input id="password" name="password" type="text" placeholder="Enter a password" class="form-control input-md" required=""> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="user_type">User Type</label> <div class="col-md-8"> <select id="user_type" name="user_type" class="form-control"> <option value="0" id = "s">Simple</option> <option value="1" id = "a">Admin</option> </select> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="create"></label> <div class="col-md-8"> <button id="create_btn" name="create_btn" class="btn btn-success">Create</button> </div> </div>';
		$("#bigContainer").append(form);
		arg="user_create"; 
	});
	
	$('#project_post').click(function(){
		
		console.log("create project menu pressed");
		$("#bigContainer").html("");
	 	$("#bigContainer").append('<h1 class="page-header" id="page_title">Create Project</h1>');
		var form = '<div class="form-group" id="myForm"> <label class="col-md-8 control-label" for="name">Name</label> <div class="col-md-8"> <input id="project_name" name="name" type="text" placeholder="Enter project name" class="form-control input-md" required=""> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="project_type">Project Type</label> <div class="col-md-8"> <select id="project_type" name="user_type" class="form-control"> <option value="-1">Select</option> <option value="Android application">Android application</option> <option value="Web application">Web application</option> <option value="iOS application">iOS application</option> <option value="Desktop application">Desktop application</option> <option value="Other">Other</option> </select> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="name">Posted Username</label> <div class="col-md-8"> <input id="posted_user_name" name="name" type="text" placeholder="Enter user name" class="form-control input-md" required=""> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="posted_time">Posted Time</label> <div class="col-md-8"> <input id="posted_time" name="name" type="text" placeholder="yyyy-mm-dd" class="form-control input-md" required=""> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="rate">Rate</label> <div class="col-md-8"> <input id="rate" name="rate" type="text" placeholder="0-10" class="form-control input-md" required=""> </div> </div> <div class="form-group"> <label class="col-md-8 control-label" for="create"></label> <div class="col-md-8"> <button id="create_btn" name="create_btn" class="btn btn-success">Create</button> </div> </div> </fieldset>';		
		$("#bigContainer").append(form);
		arg= "project_post";
	});
		

	$('#sign_out').click(function(){
		console.log("signout pressed");
		$.get("api/signout", function(resp){
			console.log(resp);
			if(resp.m==1)
				window.location.href="../index.html";
			
		});
	});

	$('#news').click(function(){
		
		$("#bigContainer").html("");
	 	$("#bigContainer").append('<h1 class="page-header" id="page_title">News</h1>');
	 	$.get("api/soap", function(resp){
	 		console.log(resp);
	 	})

	});

	$('#news_create').click(function(){
		
		$("#bigContainer").html("");
	 	$("#bigContainer").append('<h1 class="page-header" id="page_title">Creating News</h1>');
	});

	$('#user_requests').click(function(){
		
		$("#bigContainer").html("");
	 	$("#bigContainer").append('<h1 class="page-header" id="page_title">User Requests</h1>');
	 	$.get('api/user_request/1', function(resp){
	 		console.log(resp);
		  	$("#bigContainer").append(
	  			$('<div/>', {'class': 'table-responsive'}).append(
		        	$('<table/>', {'class': 'table table-striped'}).append(
	            		).append('<thead/>')
	            	)
	            );
		  	var s = "Subject";
            var id="ID";
            var email="Email";
            var ui="User ID";

            var markup = "<tr><th>Select</th><th>" + id + "</th><th>" + s + "</th><th>" + email + "</th><th>" + ui + "</th>";
            $("thead").append(markup);
            $("table").append("<tbody/>");
		  	var i=0;
		  	while(i<resp.count)
		  	{
			  	var su=resp[i].subject;
	            var ui=resp[i].user_id;
	           	var e=resp[i].email;
	            var id=resp[i].id;
	            con=resp[i].content;
	            var s="user "+id; 
	           	var markup = "<tr id='"+s+"'><td><input type='checkbox' name='record' class='userCheckbox' id='"+id+"'></td><td class='1'>" + id + "</td><td class='2'>" + su + "</td><td class='3'>" + e + "</td><td class='4'>" + ui+ "</td>";
	            $("thead").append(markup);
	            i++;
		  	}
		  	var mod='<button type="button" class="btn btn-primary" id="read_req">Open</button>';			
   			$("#bigContainer").append(mod);
   			arg='read_req';
	 	});
	});


});


		