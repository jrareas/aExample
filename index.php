<?php

/**
 *  Get init
 */
require_once($_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR .  'init.php');
session_start();
$smarty->assign('menu',CoreIncludes::getInc('menu'));
$smarty->assign('account_app_url',CoreIncludes::getApp('account',true));
CoreHandleApp::handle();

