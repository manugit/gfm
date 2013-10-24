<?php /* Smarty version Smarty-3.1.15, created on 2013-10-23 23:46:51
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:240755266f76ea56ba2-67642844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1382564809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '240755266f76ea56ba2-67642844',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5266f76ec3a8c8_06350369',
  'variables' => 
  array (
    'title' => 0,
    'newPot' => 0,
    'users' => 0,
    'products' => 0,
    'pot' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5266f76ec3a8c8_06350369')) {function content_5266f76ec3a8c8_06350369($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<?php if ($_smarty_tpl->tpl_vars['newPot']->value) {?>
    <script src="newPot.js" type="text/javascript"></script>
<?php } else { ?>
	<script src="gfm.js" type="text/javascript"></script>
	<script language="JavaScript">
		var users = <?php echo json_encode($_smarty_tpl->tpl_vars['users']->value);?>
;
		var products = <?php echo json_encode($_smarty_tpl->tpl_vars['products']->value);?>
;
		var pot = <?php echo json_encode($_smarty_tpl->tpl_vars['pot']->value);?>
;
	</script>
<?php }?>
<link rel="stylesheet" href="gfm.css" />
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['newPot']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('newPot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
	<h1><?php echo $_smarty_tpl->tpl_vars['pot']->value['name'];?>
</h1>
	
    <?php echo $_smarty_tpl->getSubTemplate ('pot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ('item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('scopeUpperCase'=>'New','scopeLowerCase'=>'add','buttonText'=>'Ausgabe hinzuf&uuml;gen'), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ('item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('scopeUpperCase'=>'Edit','scopeLowerCase'=>'edit','buttonText'=>'Ausgabe speichern'), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ('participant.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
</body>
</html><?php }} ?>
