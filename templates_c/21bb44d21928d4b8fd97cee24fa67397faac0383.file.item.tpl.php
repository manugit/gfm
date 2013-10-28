<?php /* Smarty version Smarty-3.1.15, created on 2013-10-28 20:01:24
         compiled from ".\templates\item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243155268fdf2e0abe5-04615695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21bb44d21928d4b8fd97cee24fa67397faac0383' => 
    array (
      0 => '.\\templates\\item.tpl',
      1 => 1382986882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243155268fdf2e0abe5-04615695',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5268fdf3002844_68801240',
  'variables' => 
  array (
    'scopeLowerCase' => 0,
    'displayedPage' => 0,
    'scopeUpperCase' => 0,
    'users' => 0,
    'buttonText' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5268fdf3002844_68801240')) {function content_5268fdf3002844_68801240($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
Item_page" <?php if ($_smarty_tpl->tpl_vars['displayedPage']->value!=((string)$_smarty_tpl->tpl_vars['scopeLowerCase']->value)."Item_page") {?>style="display: none;"<?php }?>>
	<form id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
ItemForm" name="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
ItemForm" onsubmit="check<?php echo $_smarty_tpl->tpl_vars['scopeUpperCase']->value;?>
Item(this); return false;">
		<input type="hidden" name="id" />
		<table>
			<tbody id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_tbody">
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" /></td>
					<td id="name_error"></td>
				</tr>
				<tr>
					<td>Betrag</td>
					<td><input type="text" name="amount" /></td>
					<td id="amount_error"></td>
				</tr>
				<tr>
					<td>Datum</td>
					<td><input type="text" name="date" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_date_picker" /></td>
					<td id="date_error"></td>
				</tr>
				<tr>
					<td>Zahler</td>
					<td>
						<select name="buyer" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_buyer">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['user'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['user']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['name'] = 'user';
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['users']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total']);
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_option_<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['name'];?>
</option>
						<?php endfor; endif; ?>	
						</select>
					<td id="buyer_error"></td>
				</tr>
				<tr>
					<td>Konsumation</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['user'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['user']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['name'] = 'user';
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['users']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['user']['total']);
?>
					<tr id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['name'];?>
">
						<td>&nbsp;</td>
						<td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['name'];?>
<div class="percentageDiv"><input type="text" name="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['name'];?>
_percentage" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['name'];?>
_percentage" /> %</div></td>
						<td>&nbsp;</td>
					</tr>
				<?php endfor; endif; ?>
			</tbody>
			<tfoot>
				<tr>
					<td>&nbsp;</td>
					<td id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_error">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</tfoot>
		</table>
		
		<input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['buttonText']->value;?>
">
	</form><button onclick="clearItemFormAndReturn('<?php echo $_smarty_tpl->tpl_vars['scopeUpperCase']->value;?>
')">Zur&uuml;ck zum Pot</button>
</div><?php }} ?>
