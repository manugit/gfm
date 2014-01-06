<?php /* Smarty version Smarty-3.1.15, created on 2014-01-06 20:38:58
         compiled from ".\templates\item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24705527acc4c2668b9-93302291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21bb44d21928d4b8fd97cee24fa67397faac0383' => 
    array (
      0 => '.\\templates\\item.tpl',
      1 => 1389037136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24705527acc4c2668b9-93302291',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_527acc4c4cf976_63454212',
  'variables' => 
  array (
    'scopeLowerCase' => 0,
    'displayedPage' => 0,
    'scopeUpperCase' => 0,
    'editProduct' => 0,
    'users' => 0,
    'buttonText' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527acc4c4cf976_63454212')) {function content_527acc4c4cf976_63454212($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
Item_page" <?php if ($_smarty_tpl->tpl_vars['displayedPage']->value!=((string)$_smarty_tpl->tpl_vars['scopeLowerCase']->value)."Item_page") {?>style="display: none;"<?php }?>>
	<form id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
ItemForm" onsubmit="check<?php echo $_smarty_tpl->tpl_vars['scopeUpperCase']->value;?>
Item(); return false;" class="form-horizontal" role="form">
		<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=="edit") {?><input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_id" value="<?php if (isset($_smarty_tpl->tpl_vars['editProduct']->value)) {?><?php echo $_smarty_tpl->tpl_vars['editProduct']->value['rowId'];?>
<?php }?>" /><?php }?>
		<div class="form-group" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_name_div">
			<label class="control-label col-sm-2" for="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_name">Name</label>
			<div class="col-sm-5">
				<input type="text" class="form-control col-sm-5" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_name" <?php if (isset($_smarty_tpl->tpl_vars['editProduct']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['editProduct']->value['name'];?>
" <?php }?>>
			</div>
			<span class="help-block col-sm-5" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_name_error"></span>
		</div>
		<div class="form-group" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_amount_div">
			<label class="control-label col-sm-2" for="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_amount">Betrag</label>
			<div class="col-sm-5">
				<input type="text" class="form-control col-sm-5" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_amount" <?php if (isset($_smarty_tpl->tpl_vars['editProduct']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['editProduct']->value['price'];?>
" <?php }?>>
			</div>
			<span class="help-block col-sm-5" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_amount_error"></span>
		</div>
		<div class="form-group" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_date_div">
			<label class="control-label col-sm-2" for="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_date_picker">Datum</label>
			<div class="col-sm-5">
				<input type="text" class="form-control col-sm-5" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_date_picker" <?php if (isset($_smarty_tpl->tpl_vars['editProduct']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['editProduct']->value['date'];?>
" <?php }?>>
			</div>
			<span class="help-block col-sm-5" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_date_error"></span>
		</div>
		<div class="form-group" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_buyer_div">
			<label class="control-label col-sm-2" for="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_buyer">Zahler</label>
			<div class="col-sm-5">
				<select class="form-control" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
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
					<option value="<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_option_<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['editProduct']->value)&&$_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname']==$_smarty_tpl->tpl_vars['editProduct']->value['buyer']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
</option>
				<?php endfor; endif; ?>	
				</select>
			</div>
			<span class="help-block col-sm-5" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_buyer_error"></span>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Konsumation</label>
			<div class="col-sm-10"></div>
		</div>
		<div id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_participants_consumptions">
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
			<div class="form-group" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
_percentage_div">
				<label class="control-label col-sm-2" for="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
_percentage"><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
</label>
				<div class="percentageDiv col-sm-5"><div class="percentageDiv col-sm-4">
					<input type="text" class="form-control" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
_percentage" <?php if (isset($_smarty_tpl->tpl_vars['editProduct']->value)) {?>value="<?php echo 100*$_smarty_tpl->tpl_vars['editProduct']->value[$_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname']];?>
" <?php }?>/>
				</div><label class="control-label col-sm-1"> %</label></div>
				<span class="help-block col-sm-5" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_item_<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
_percentage_error"></span>
			</div>
		<?php endfor; endif; ?>
		</div>
		<button type="submit" id="<?php echo $_smarty_tpl->tpl_vars['scopeLowerCase']->value;?>
_submit" class="btn btn-primary btn-block"><?php echo $_smarty_tpl->tpl_vars['buttonText']->value;?>
</button>
	</form>
</div><?php }} ?>
