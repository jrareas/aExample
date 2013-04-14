var login = {
		validaLogin: function(){
			
			var form = $('#usersLogin');
			$("#loginNotPossible").hide();
			if (($('#users_password').val() != "") && ($('#users_user_id').val() != "")){
				$('.ajaxLoading').show();
				$.ajax({
					type:'POST',
					url:'/app/remote.php?processRequest=checkLogin',
					data:form.serialize(),
					dataType: "json"}).done
					(function(response){
						//alert(response.result);
						if(response.loginResult == "error"){
							$("#loginNotPossible").show();
						}else{
							window.location = "/app/dashboard.php";	
						}
						$('.ajaxLoading').hide();
						
					}).fail(function(response,textStatus){
						alert('Something goes wrong. Please try again.');
						$('.ajaxLoading').hide();
					});
			}else{
				alert('You must provide username and password to log in the system.');
			}
			
			return false;
		},
		forgotPassword:function(){
			$("#loginNotPossible").hide();
			if(($('#users_user_id').val() != "")){
				$('.ajaxLoading').show();
				$.ajax({
					type:'POST',
					url:'/app/remote.php?processRequest=forgotPassword',
					data:$('#usersLogin').serialize(),
					dataType: "json"}).done
					(function(response){
						alert(response.message);
						$('.ajaxLoading').hide();
						//window.location = "/dash_board";
					}).fail(function(response,textStatus){
						alert('Something goes wrong. Please try again.');
						$('.ajaxLoading').hide();
						//alert(textStatus);
					});
			}else{
				alert('You must provide User ID.');
			}
			
		}
		
}