var general ={
	logout:function(){
		general.callAjax("/app/remote.php?processRequest=logout", "POST", "json")
	},
	callAjax:function(purl,ptype,pdataType){
		$(".ajaxLoading").show();
		$.ajax({
				type:ptype,
				url:purl,
				dataType:pdataType}).done(
					function(response){
						if(response.loginResult == "error"){
							alert('Operation was not possible. Please, try again later.');
							$('.ajaxLoading').hide();
						}else if(response.loginResult == "redirect"){
							window.location = response.redirectTo;
						}
					}
				).fail(
					function(response,textStatus){
						alert('Something goes wrong. Please try again.');
						$('.ajaxLoading').hide();
					}
				);
	}
	
		
}
