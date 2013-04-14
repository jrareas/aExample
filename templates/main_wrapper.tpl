<header>
	<div id="header">
		<span class=ajaxLoading>{html_image file="/images/ajax-loader.gif"} Loading...Please wait!</span>
		<div id='welcome'>
				Welcome {$user.user_first_name} {$user.user_last_name}<br>
				Your Last login was {$user.last_login}<br>
		</div>
	</div>
	<div class=quick_menu>
		{html_image file='/images/application_exit.png' onclick='general.logout()' title="Logout ({$user.user_first_name} {$user.user_last_name})" alt="Logout ({$user.user_first_name} {$user.last_name})"}
	</div>
	<div class=alerts id='notes'>
	<div id=cssmenum>
		
	</div>
</header>
	{include file=$wrapper}
<footer>
</footer>