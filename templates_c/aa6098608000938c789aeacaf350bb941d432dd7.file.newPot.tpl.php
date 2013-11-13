<?php /* Smarty version Smarty-3.1.15, created on 2013-11-13 00:51:52
         compiled from ".\templates\newPot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197845277ee6db37355-73826644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa6098608000938c789aeacaf350bb941d432dd7' => 
    array (
      0 => '.\\templates\\newPot.tpl',
      1 => 1384300301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197845277ee6db37355-73826644',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5277ee6dbe8230_19205854',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5277ee6dbe8230_19205854')) {function content_5277ee6dbe8230_19205854($_smarty_tpl) {?><div class="jumbotron">
	<h1>Willkommen auf der Gruppen<wbr>finanzierungs<wbr>verwaltung!</h1>
	<p>Wie oft stellte sich die gemeinsame Finanzierung problematisch heraus? Mit dieser Verwaltung schaffen wir nun Abhilfe und erlauben Ihnen die Finanzen in einer Gruppe unter Kontrolle zu halten.</p>
	<p>Z&ouml;gern Sie nicht und starten gleich mit einem Pot!</p>
</div>
<div id="newPot_page">
	<div id="wellcome">
		<form id="addPotForm" onsubmit="checkNewPot(); return false;" class="form-horizontal" role="form">
			<div class="form-group" id="potname_div">
				<label class="control-label col-sm-2" for="potname">Potname</label>
				<div class="col-sm-5">
					<input type="text" class="form-control col-sm-5" id="potname">
				</div>
				<span class="help-block col-sm-5" id="potname_error"></span>
			</div>
			<div class="form-group" id="potdescription_div">
				<label class="control-label col-sm-2" for="potdescription">Potbeschreibung</label>
				<div class="col-sm-5">
					<textarea class="form-control" rows="3" id="potdescription"></textarea>
				</div>
				<span class="help-block col-sm-5" id="potdescription_error"></span>
			</div>
			<div class="form-group" id="validFrom_div">
				<label class="control-label col-sm-2" for="validFrom">G&uuml;ltig von</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="validFrom">
				</div>
				<span class="help-block col-sm-5" id="validFrom_error"></span>
			</div>
			<div class="form-group" id="validTo_div">
				<label class="control-label col-sm-2" for="validTo">G&uuml;ltig bis</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="validTo">
				</div>
				<span class="help-block col-sm-5" id="validTo_error"></span>
			</div>
			<div class="form-group" id="nickname_div">
				<label class="control-label col-sm-2" for="nickname">Ihr Nickname</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nickname">
				</div>
				<span class="help-block col-sm-5" id="nickname_error"></span>
			</div>
			<div class="form-group" id="name_div">
				<label class="control-label col-sm-2" for="name">Ihr Name</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="name">
				</div>
				<span class="help-block col-sm-5" id="name_error"></span>
			</div>
			<div class="form-group" id="firstname_div">
				<label class="control-label col-sm-2" for="firstname">Ihr Vorname</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="firstname">
				</div>
				<span class="help-block col-sm-5" id="firstname_error"></span>
			</div>
			<div class="form-group" id="email_div">
				<label class="control-label col-sm-2" for="email">Ihre Email</label>
				<div class="col-sm-5">
					<input type="email" class="form-control" id="email">
				</div>
				<span class="help-block col-sm-5" id="email_error"></span>
			</div>
			<div class="form-group" id="birthday_div">
				<label class="control-label col-sm-2" for="birthday_picker">Ihr Geburtstag</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="birthday_picker">
				</div>
				<span class="help-block col-sm-5" id="birthday_error"></span>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Pot erstellen</button>
		</form>
	</div>
	<div id="potcreation" style="display: none;">
		<h1>Herzliche Gratulation</h1>
		<p>Der Pot wurde erfolgreich erstellt. <a id="link_to_new_pot">Hier geht es zum Pot!</a></p>
		<p id="wholeURL"></p>
		<p><i>Speichern Sie sich die URL unverz&uuml;glich.</i></p>
		<button onclick="showWellcomeScreen()" class="btn btn-primary">Weiteren Pot erstellen</button>
	</div>		
</div><?php }} ?>
