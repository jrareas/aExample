<div id="header">
	<span class=ajaxLoading>{html_image file="/base/images/ajax-loader.gif"} Loading...Please wait!</span>
	<div id='welcome'>
		Welcome {$user.users_first_name} {$user.users_last_name}<br>
		Your Last login was {$user.users_last_login}<br>
		Your session will exprire in <span id=sessionTimeExpiration></span>
	</div>
</div>
<div class=quick_menu>
{html_image file='/base/images/application_exit.png' onclick='general.logout()' title="Logout ({$user.users_first_name} {$user.users_last_name})" alt="Logout ({$user.users_first_name} {$user.users_last_name})"}
</div>
