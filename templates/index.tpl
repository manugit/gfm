<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8" />
<title>{$title}</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
{if $newPot}
    <script src="newPot.js" type="text/javascript"></script>
{else}
	<script src="gfm.js" type="text/javascript"></script>
	<script language="JavaScript">
		var users = {$users|json_encode};
		var products = {$products|json_encode};
		var pot = {$pot|json_encode};
	</script>
{/if}
<link rel="stylesheet" href="gfm.css" />
</head>
<body>
{if $newPot}
    {include file='newPot.tpl'}
{else}
	<h1>{$pot.name}</h1>
	{* TODO set variable which page should be present *}
    {include file='pot.tpl'}
    {include file='item.tpl' scopeUpperCase='New' scopeLowerCase='add' buttonText='Ausgabe hinzuf&uuml;gen'}
    {include file='item.tpl' scopeUpperCase='Edit' scopeLowerCase='edit' buttonText='Ausgabe speichern'}
    {include file='participant.tpl'}
{/if}
</body>
</html>