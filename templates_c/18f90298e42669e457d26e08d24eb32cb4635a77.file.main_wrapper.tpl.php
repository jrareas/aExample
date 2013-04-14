<?php /* Smarty version Smarty-3.1.13, created on 2013-04-12 17:42:57
         compiled from "/Users/jrareas/Developer/php/avidExample/templates/main_wrapper.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155742993851687fe1341ee6-00137807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18f90298e42669e457d26e08d24eb32cb4635a77' => 
    array (
      0 => '/Users/jrareas/Developer/php/avidExample/templates/main_wrapper.tpl',
      1 => 1365801516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155742993851687fe1341ee6-00137807',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'wrapper' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51687fe13e9f77_16312752',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51687fe13e9f77_16312752')) {function content_51687fe13e9f77_16312752($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_image')) include '/Users/jrareas/Developer/php/avidExample/libs/Smarty/libs/plugins/function.html_image.php';
?><header>
	<div id="header">
		<span class=ajaxLoading><?php echo smarty_function_html_image(array('file'=>"/images/ajax-loader.gif"),$_smarty_tpl);?>
 Loading...Please wait!</span>
		<div id='welcome'>
				Welcome <?php echo $_smarty_tpl->tpl_vars['user']->value['user_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['user_last_name'];?>
<br>
				Your Last login was <?php echo $_smarty_tpl->tpl_vars['user']->value['last_login'];?>
<br>
		</div>
	</div>
	<div class=quick_menu>
		<?php echo smarty_function_html_image(array('file'=>'/images/application_exit.png','onclick'=>'general.logout()','title'=>"Logout (".((string)$_smarty_tpl->tpl_vars['user']->value['user_first_name'])." ".((string)$_smarty_tpl->tpl_vars['user']->value['user_last_name']).")",'alt'=>"Logout (".((string)$_smarty_tpl->tpl_vars['user']->value['user_first_name'])." ".((string)$_smarty_tpl->tpl_vars['user']->value['last_name']).")"),$_smarty_tpl);?>

	</div>
	<div class=alerts id='notes'>
	<div id=cssmenum>
		
	</div>
</header>
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['wrapper']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<footer>
</footer><?php }} ?>