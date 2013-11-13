<?php /* Smarty version Smarty-3.1.15, created on 2013-11-08 12:19:59
         compiled from ".\templates\navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28026527a7ace7026e4-29873649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3753d61d0f7228429e0082836f138067d2e8af4e' => 
    array (
      0 => '.\\templates\\navbar.tpl',
      1 => 1383909597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28026527a7ace7026e4-29873649',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_527a7ace73e720_49798516',
  'variables' => 
  array (
    'displayedPage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527a7ace73e720_49798516')) {function content_527a7ace73e720_49798516($_smarty_tpl) {?><div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/gfm/">GFM - Home</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li id="nav_pot_li" <?php if ($_smarty_tpl->tpl_vars['displayedPage']->value=="pot_page") {?>class="active" <?php }?>onclick="displayPotPage()"><a
					class="clickable">Pot &Uuml;bersicht</a></li>
				<li id="nav_participant_li" <?php if ($_smarty_tpl->tpl_vars['displayedPage']->value=="participant_page") {?>class="active" <?php }?>onclick="displayParticipantPage();"><a
					class="clickable">Teilnehmer bearbeiten</a></li>
				<li id="nav_addItem_li" <?php if ($_smarty_tpl->tpl_vars['displayedPage']->value=="addItem_page") {?>class="active" <?php }?>onclick="displayAddItemPage()"><a class="clickable">Ausgaben
						hinzuf&uuml;gen</a></li>
			</ul>
		</div>
	</div>
</div><?php }} ?>
