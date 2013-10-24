<?php /* Smarty version Smarty-3.1.15, created on 2013-10-24 13:01:06
         compiled from ".\templates\pot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21865268fdf2d7e721-53490548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d0773d214d8f35e1ebfcedfd4845f7b0a299f2f' => 
    array (
      0 => '.\\templates\\pot.tpl',
      1 => 1382611345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21865268fdf2d7e721-53490548',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'pot' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5268fdf2dc93e1_06296073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5268fdf2dc93e1_06296073')) {function content_5268fdf2dc93e1_06296073($_smarty_tpl) {?><div id="pot_page">
	<p>Anzahl Ausgaben: <?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
<br />
		Pot g&uuml;ltig von <?php echo $_smarty_tpl->tpl_vars['pot']->value['startDate'];?>
 bis <?php echo $_smarty_tpl->tpl_vars['pot']->value['endDate'];?>
</p>
	<table id="expense_table">
		<thead>
			<tr id="expense_header_row">
				<th>Datum</th>
				<th>L</th>
				<th>B</th>
				<th>Beschreibung</th>
				<th>Betrag</th>
				<th>Zahler</th>
			</tr>
		</thead>
		<tbody id="sortable"></tbody>
		<tfoot>
			<tr id="sum_pay">
				<td colspan="5">Bezahlt</td>
				<td class="currency">CHF</td>
			</tr>
			<tr id="sum_use">
				<td colspan="5">Konsumiert</td>
				<td class="currency">CHF</td>
			</tr>
			<tr id="sum_diff">
				<th colspan="5">Differenz</th>
				<th class="currency">CHF</th>
			</tr>
		</tfoot>
	</table>
	<button onclick="displayPage('addItem_page')">Ausgabe hinzuf&uuml;gen</button>
	<button onclick="displayPage('participant_page')">Teilnehmer bearbeiten</button>
	<button onclick="calcSolution()">L&ouml;sungsvorschlag berechnen</button>
	<div id="solution_div">
		<h2>L&ouml;sungsvorschlag</h2>
		<table>
			<thead>
				<tr>
					<th>Schuldner</th>
					<th>Gl&auml;ubiger</th>
					<th>Betrag</th>
				</tr>
			</thead>
			<tbody id="solution"></tbody>
		</table>
	</div>
</div><?php }} ?>
