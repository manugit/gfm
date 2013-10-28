<?php /* Smarty version Smarty-3.1.15, created on 2013-10-28 17:02:18
         compiled from ".\templates\participant.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69365268fdf3063ef5-92725191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91e1c2d9f3bb48ccec29b886fcb785c67292db9b' => 
    array (
      0 => '.\\templates\\participant.tpl',
      1 => 1382976125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69365268fdf3063ef5-92725191',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5268fdf30f3d56_63616326',
  'variables' => 
  array (
    'displayedPage' => 0,
    'users' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5268fdf30f3d56_63616326')) {function content_5268fdf30f3d56_63616326($_smarty_tpl) {?><div id="participant_page" <?php if ($_smarty_tpl->tpl_vars['displayedPage']->value!="participant_page") {?>style="display: none;"<?php }?>>
	<h2>Teilnehmer</h2>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>L</th>
				<th>B</th>
				<th>Vorname</th>
				<th>Email</th>
				<th>Geburtstag</th>
			</tr>
		</thead>
		<tbody id="participant_tbody">
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
			<tr id="<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['id'];?>
">
				<td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['name'];?>
</td>
				<td class="clickable" onclick="removeParticipantFromPot('<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['id'];?>
')">X</td>
				<td>E</td>
				<td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['firstname'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['email'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['birthday'];?>
</td>
			</tr>
		<?php endfor; endif; ?>
		</tbody>
	</table>
	<h2>Neuer Teilnehmer hinzuf&uuml;gen</h2>
	<form id="addParticipantForm" name="addParticipantForm" onsubmit="checkNewParticipant(this); return false;">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" /></td>
				<td id="name_error"></td>
			</tr>
			<tr>
				<td>Vorname</td>
				<td><input type="text" name="firstname" /></td>
				<td id="firstname_error"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" /></td>
				<td id="email_error"></td>
			</tr>
			<tr>
				<td>Birthday</td>
				<td><input type="text" name="birthday" id="birthday_picker" /></td>
				<td id="birthday_error"></td>
			</tr>
		</table>
		<input type="submit" value="Teilnehmer hinzuf&uuml;gen">
	</form><button onclick="clearParticipantFormAndReturn()">Zur&uuml;ck zum Pot</button>
</div><?php }} ?>
