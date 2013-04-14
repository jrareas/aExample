<?php /* Smarty version Smarty-3.1.13, created on 2013-04-12 17:36:25
         compiled from "/Users/jrareas/Developer/php/avidExample/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39470358551687e590b4971-92538167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15dfae4f27a3120846dac5a17c3af0f1096b4b06' => 
    array (
      0 => '/Users/jrareas/Developer/php/avidExample/templates/login.tpl',
      1 => 1365792021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39470358551687e590b4971-92538167',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51687e59141f46_59071958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51687e59141f46_59071958')) {function content_51687e59141f46_59071958($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_image')) include '/Users/jrareas/Developer/php/avidExample/libs/Smarty/libs/plugins/function.html_image.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
	<div class=loginframe>
				<?php echo smarty_function_html_image(array('file'=>'/images/financial-planning-a-pen-on-a-pile-of-charts.jpg','class'=>'imgHeaderFrame'),$_smarty_tpl);?>

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
								<input type="text" name="users_user_id" id=users_user_id value="<?php echo $_smarty_tpl->tpl_vars['user']->value['users_user_id'];?>
" />
							</td>
						</tr>
						<tr>
							<td style="width:70px;text-align:right "><label for='users_password' >Password</label>
							</td>
							<td>
								<input type="password" name="users_password" id=users_password value="<?php echo $_smarty_tpl->tpl_vars['user']->value['users_password'];?>
" />
							</td>
						</tr>
						<tr>
						<td colspan=2><hr>
							<?php echo smarty_function_html_image(array('file'=>'/images/ajax-loader.gif','class'=>"ajaxLoading"),$_smarty_tpl);?>

						</td>
						</tr>
						<tr>
							<td colspan=3 style="text-align:right">
							<input type=button value="Get Password" style="text-align:right;width:100px;text-align:center" onclick='login.forgotPassword()'/>
							<span style="font-size:15">   </span>
							<input type=button value=Go style="text-align:right;width:100px;text-align:center" onclick='login.validaLogin();'/>
							<?php echo smarty_function_html_image(array('file'=>'/images/question.png','class'=>'imgQuestion','onmouseover'=>"document.getElementById('hint').style.display='inline';",'onMouseOut'=>"document.getElementById('hint').style.display='none';"),$_smarty_tpl);?>

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
</html><?php }} ?>