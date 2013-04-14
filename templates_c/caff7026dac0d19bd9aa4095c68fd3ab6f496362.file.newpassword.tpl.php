<?php /* Smarty version Smarty-3.1.13, created on 2013-04-12 17:43:12
         compiled from "/Users/jrareas/Developer/php/avidExample/templates/newpassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153487247351687ff00fdbf9-20903762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caff7026dac0d19bd9aa4095c68fd3ab6f496362' => 
    array (
      0 => '/Users/jrareas/Developer/php/avidExample/templates/newpassword.tpl',
      1 => 1361327404,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153487247351687ff00fdbf9-20903762',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'image' => 0,
    'viewVars' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51687ff016f580_77229447',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51687ff016f580_77229447')) {function content_51687ff016f580_77229447($_smarty_tpl) {?>	<style type="text/css">
		.emailNewPassword{
			position:absolute;
			top:200px;
			left:30%;
			border: 1px solid #ccc;
			width:50em;
		    height:48em;
		    margin-top: -15em; /*set to a negative number 1/2 of your height*/
		    margin-left: -15em; /*set to a negative number 1/2 of your width*/
		    border-radius: 15px;
		    box-shadow: 7px 7px 3px #888888;
		    background-color:#dedede;
		}
		.imgHeaderFrame{
			border-radius: 15px 15px 0px 0px;
			width:50em;
			margin:0px;
			padding:0px;
			position:relative;
		}
		.container{
			height:50em;
		}
		.emailText{
			margin:10px;
		}
		hr{
			margin:0px;
			padding:0px;
		}
	</style>
<div class="container">
	<div class=emailNewPassword>
	<img class="imgHeaderFrame" src="data:image/jpeg;base64, <?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" >
	<hr>
	<div class="emailText">
	Hello 
	<?php echo $_smarty_tpl->tpl_vars['viewVars']->value['fullName'];?>
,<br>
	<p>
	You are receiving this email because a new password was requested for you or in your behalf. If it is not true, you can just ignore it.
	</p>
	<p>
	Your new password is <?php echo $_smarty_tpl->tpl_vars['viewVars']->value['newPassword'];?>

	</p>
	<p>
	The link below must be used in order to the system confirm the request and change your password.
	</p>
	<p>
	<?php echo $_smarty_tpl->tpl_vars['viewVars']->value['linkConfirmation'];?>

	</p>
	<p>
	Enjoy the system
	</p>
	
	</div> 
	</div>
</div><?php }} ?>