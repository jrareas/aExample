<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	{include file='head.tpl'}
<body>
	<div class=loginframe>
				{html_image file= '/images/financial-planning-a-pen-on-a-pile-of-charts.jpg' class='imgHeaderFrame'}
				<form id=usersLogin>
					<table border=0 class="loginTable">
						<tr>
							<td colspan=2>						
								<hr>
							</td>
						</tr>
						<tr>
							<td style="width:100px;text-align:right "><label for='users_user_id' >User ID</label>
							</td>
							<td>
								<input type="text" name="users_user_id" id=users_user_id value="{$user.users_user_id}" />
							</td>
						</tr>
						<tr>
							<td style="width:70px;text-align:right "><label for='users_password' >Password</label>
							</td>
							<td>
								<input type="password" name="users_password" id=users_password value="{$user.users_password}" />
							</td>
						</tr>
						<tr>
						<td colspan=2><hr>
							{html_image file='/images/ajax-loader.gif' class="ajaxLoading"}
						</td>
						</tr>
						<tr>
							<td colspan=3 style="text-align:right">
							<input type=button value="Get Password" style="text-align:right;width:100px;text-align:center" onclick='login.forgotPassword()'/>
							<span style="font-size:15">   </span>
							<input type=button value=Go style="text-align:right;width:100px;text-align:center" onclick='login.validaLogin();'/>
							{html_image file= '/images/question.png' class='imgHeaderFrame' onmouseover="document.getElementById('hint').style.display='inline';" onMouseOut="document.getElementById('hint').style.display='none';" class='imgQuestion'}
							<span class=hint id=hint>
								<ul>
									<li>Fill the User ID and password before use the button Go to log in the system</li>
									<li>Fill the User ID and use the button Get Password to receive a new password by email</li>
								</ul>
							</span>
							</td>
						</tr>
					</table>
					</form>
					<span id=loginNotPossible>The information provided do not match with a valid user name or password. Please try again with a valid credential.</span>
				</div>
</body>
</html>