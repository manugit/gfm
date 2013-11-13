<?php /* Smarty version Smarty-3.1.15, created on 2013-11-13 00:50:26
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31627527acc4bf0d899-92378037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1384300139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31627527acc4bf0d899-92378037',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_527acc4c18ae76_51034199',
  'variables' => 
  array (
    'title' => 0,
    'rootpath' => 0,
    'newPot' => 0,
    'users' => 0,
    'products' => 0,
    'pot' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527acc4c18ae76_51034199')) {function content_527acc4c18ae76_51034199($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
/css/bootstrap-theme.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
/js/bootstrap.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
/js/general.js" type="text/javascript"></script>
<?php if ($_smarty_tpl->tpl_vars['newPot']->value) {?>
    <script src="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
/js/newPot.js" type="text/javascript"></script>
<?php } else { ?>
	<script src="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
/js/gfm.js" type="text/javascript"></script>
	<script language="JavaScript">
		var users = <?php echo json_encode($_smarty_tpl->tpl_vars['users']->value);?>
;
		var products = <?php echo json_encode($_smarty_tpl->tpl_vars['products']->value);?>
;
		var pot = <?php echo json_encode($_smarty_tpl->tpl_vars['pot']->value);?>
;
	</script>
<?php }?>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
/css/gfm.css" />
</head>
<body>
	<div id="successDiv" class="alert alert-success">
		<strong>Erfolg! </strong><span id="successText">Das ist der Erfolgstext.</span>
	</div>
	<div id="infoDiv" class="alert alert-info">
		<strong>Info! </strong><span id="infoText">Das ist der Infotext.</span>
	</div>
	<div id="warningDiv" class="alert alert-warning">
		<strong>Warnung! </strong><span id="warningText">Das ist der Warnungsstext.</span>
	</div>
	<div id="errorDiv" class="alert alert-danger">
		<strong>Fehler! </strong><span id="errorText">Das ist der Fehlertext.</span>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['newPot']->value) {?>
	<?php echo $_smarty_tpl->getSubTemplate ('navbar_newPot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container theme-showcase">
	    <?php echo $_smarty_tpl->getSubTemplate ('newPot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php } else { ?>
	<?php echo $_smarty_tpl->getSubTemplate ('navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="container theme-showcase">
    	<div class="page-header"><h1><?php echo $_smarty_tpl->tpl_vars['pot']->value['name'];?>
 <small><?php echo $_smarty_tpl->tpl_vars['pot']->value['description'];?>
</small></h1></div>
	    <?php echo $_smarty_tpl->getSubTemplate ('pot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	    <?php echo $_smarty_tpl->getSubTemplate ('item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('scopeUpperCase'=>'New','scopeLowerCase'=>'add','buttonText'=>'Ausgabe hinzuf&uuml;gen'), 0);?>

	    <?php echo $_smarty_tpl->getSubTemplate ('item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('scopeUpperCase'=>'Edit','scopeLowerCase'=>'edit','buttonText'=>'Ausgabe speichern'), 0);?>

	    <?php echo $_smarty_tpl->getSubTemplate ('participant.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	</div> <!-- /container -->
</body>
</html><?php }} ?>
