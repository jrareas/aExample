<?php /* Smarty version Smarty-3.1.13, created on 2013-04-12 17:36:18
         compiled from "/Users/jrareas/Developer/php/avidExample/templates/newpasswordconfirmation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142050554951687e5216d4f7-17981761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd42521c8b826c172a67228dca96f652fe20355df' => 
    array (
      0 => '/Users/jrareas/Developer/php/avidExample/templates/newpasswordconfirmation.tpl',
      1 => 1365802444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142050554951687e5216d4f7-17981761',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'image' => 0,
    'user_info' => 0,
    'home' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51687e521ea4a8_72500338',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51687e521ea4a8_72500338')) {function content_51687e521ea4a8_72500338($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
<div class="loginframe">
	<img class="imgHeaderFrame" src="data:image/jpeg;base64, <?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" >
	<hr>
	<div class="emailText">
	Hello 
	<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_last_name'];?>

	,<br>
	<p>
	Your new password request is finished. Now you can use the password you received by email. Use the link below to access the home page and log in the system. 
	</p>
	<p>
		<a href="http://<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
">Home</a>
	</p>
	<p>
	The link below must be used in order to the system confirm the request and change your password.
	</p>
	<p>
	<<?php ?>?php echo $linkConfirmation; ?<?php ?>>
	</p>
	<p>
	Enjoy the system
	</p>
	
	</div> 
</div>
</body>
</html><?php }} ?>