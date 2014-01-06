<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{$title}</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="{$rootpath}/css/bootstrap.css">
	<link rel="stylesheet" href="{$rootpath}/css/bootstrap-theme.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="{$rootpath}/js/bootstrap.js"></script>
	<script src="{$rootpath}/js/general.js" type="text/javascript"></script>
{if $newPot}
    <script src="{$rootpath}/js/newPot.js" type="text/javascript"></script>
{else}
	<script src="{$rootpath}/js/gfm.js" type="text/javascript"></script>
	<script language="JavaScript">
		var users = {$users|json_encode};
		var products = {$products|json_encode};
		var pot = {$pot|json_encode};
	</script>
{/if}
	<link rel="stylesheet" href="{$rootpath}/css/gfm.css" />
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
	{if $newPot}
	{include file='navbar_newPot.tpl'}
    <div class="container theme-showcase">
	    {include file='newPot.tpl'}
	{else}
	{include file='navbar.tpl'}
    <div class="container theme-showcase">
    	<div class="page-header">
		{if empty($pot)}
	<h1>Kein Pot unter der angegebenen ID gefunden</h1>
	{else}
		<h1>{$pot.name} <small>{$pot.description}</small></h1></div>
	    {include file='pot.tpl'}
	    {include file='item.tpl' scopeUpperCase='New' scopeLowerCase='add' buttonText='Ausgabe hinzuf&uuml;gen'}
	    {include file='item.tpl' scopeUpperCase='Edit' scopeLowerCase='edit' buttonText='Ausgabe speichern'}
	    {include file='participant.tpl'}
	{/if}
	{/if}
	</div> <!-- /container -->
</body>
</html>