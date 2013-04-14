<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include file='head.tpl'}
</head>
<body>
<div class="loginframe">
	<img class="imgHeaderFrame" src="data:image/jpeg;base64, {$image}" >
	<hr>
	<div class="emailText">
	Hello 
	{$user_info.user_first_name} {$user_info.user_last_name}
	,<br>
	<p>
	Your new password request is finished. Now you can use the password you received by email. Use the link below to access the home page and log in the system. 
	</p>
	<p>
		<a href="http://{$home}">Home</a>
	</p>
	<p>
	The link below must be used in order to the system confirm the request and change your password.
	</p>
	<p>
	<?php echo $linkConfirmation; ?>
	</p>
	<p>
	Enjoy the system
	</p>
	
	</div> 
</div>
</body>
</html>