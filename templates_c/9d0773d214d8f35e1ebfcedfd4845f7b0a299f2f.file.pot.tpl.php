<?php /* Smarty version Smarty-3.1.15, created on 2013-11-13 00:25:52
         compiled from ".\templates\pot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9320527acc4c1dd2f9-99268696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d0773d214d8f35e1ebfcedfd4845f7b0a299f2f' => 
    array (
      0 => '.\\templates\\pot.tpl',
      1 => 1384298751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9320527acc4c1dd2f9-99268696',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_527acc4c21eb41_73940186',
  'variables' => 
  array (
    'displayedPage' => 0,
    'products' => 0,
    'pot' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527acc4c21eb41_73940186')) {function content_527acc4c21eb41_73940186($_smarty_tpl) {?><div id="pot_page" <?php if ($_smarty_tpl->tpl_vars['displayedPage']->value!="pot_page") {?>style="display: none;"<?php }?>>
	<p>Anzahl Ausgaben: <?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
<br />Pot g&uuml;ltig von <?php echo $_smarty_tpl->tpl_vars['pot']->value['startDate'];?>
 bis <?php echo $_smarty_tpl->tpl_vars['pot']->value['endDate'];?>
</p>
	<div class="table-responsive">		
		<table id="expense_table" class="table table-striped table-hover">
			<thead>
				<tr id="expense_header_row">
					<th>Datum</th>
					<th></th>
					<th></th>
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
	</div>
	<button onclick="calcSolution()" class="btn btn-default">L&ouml;sungsvorschlag berechnen</button>
	<div id="solution_div" style="display: none;">
		<h2>L&ouml;sungsvorschlag</h2>
		<table class="table table-striped table-hover">
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
