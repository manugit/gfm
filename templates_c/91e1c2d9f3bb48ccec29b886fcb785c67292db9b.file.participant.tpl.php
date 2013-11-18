<?php /* Smarty version Smarty-3.1.15, created on 2013-11-18 20:19:08
         compiled from ".\templates\participant.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5414527acc4c51dfe8-13036988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91e1c2d9f3bb48ccec29b886fcb785c67292db9b' => 
    array (
      0 => '.\\templates\\participant.tpl',
      1 => 1384802344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5414527acc4c51dfe8-13036988',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_527acc4c5c1681_39764302',
  'variables' => 
  array (
    'displayedPage' => 0,
    'users' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527acc4c5c1681_39764302')) {function content_527acc4c5c1681_39764302($_smarty_tpl) {?><div id="participant_page" <?php if ($_smarty_tpl->tpl_vars['displayedPage']->value!="participant_page") {?>style="display: none;"<?php }?>>
	<h2>Teilnehmer</h2>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Nickname</th>
					<th></th>
					<th></th>
					<th>Name</th>
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
					<td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
</td>
					<td class="clickable" onclick="removeParticipant('<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
')"><span class='glyphicon glyphicon-trash'></span></td>
					<td class="clickable" onclick="openEditParticipantDialog('<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['nickname'];?>
')"><span class='glyphicon glyphicon-pencil'></span></td>
					<td><?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->getVariable('smarty')->value['section']['user']['index']]['name'];?>
</td>
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
	</div>
	<h2>Neuer Teilnehmer hinzuf&uuml;gen</h2>
	<div id="addParticipantFormDiv">
		<form id="addParticipantForm" onsubmit="checkNewParticipant(); return false;" class="form-horizontal" role="form">
			<div class="form-group" id="add_participant_nickname_div">
				<label class="control-label col-sm-2" for="add_participant_nickname">Nickname</label>
				<div class="col-sm-5">
					<input type="text" class="form-control col-sm-5" id="add_participant_nickname" />
				</div>
				<span class="help-block col-sm-5" id="add_participant_nickname_error"></span>
			</div>
			<div class="form-group" id="add_participant_name_div">
				<label class="control-label col-sm-2" for="add_participant_name">Name</label>
				<div class="col-sm-5">
					<input type="text" class="form-control col-sm-5" id="add_participant_name" />
				</div>
				<span class="help-block col-sm-5" id="add_participant_name_error"></span>
			</div>
			<div class="form-group" id="add_participant_firstname_div">
				<label class="control-label col-sm-2" for="add_participant_firstname">Vorname</label>
				<div class="col-sm-5">
					<input type="text" class="form-control col-sm-5" id="add_participant_firstname" />
				</div>
				<span class="help-block col-sm-5" id="add_participant_firstname_error"></span>
			</div>
			<div class="form-group" id="add_participant_email_div">
				<label class="control-label col-sm-2" for="add_participant_email">Email</label>
				<div class="col-sm-5">
					<input type="email" class="form-control col-sm-5" id="add_participant_email" />
				</div>
				<span class="help-block col-sm-5" id="add_participant_email_error"></span>
			</div>
			<div class="form-group" id="add_participant_birthday_div">
				<label class="control-label col-sm-2" for="add_participant_birthday_picker">Geburtstag</label>
				<div class="col-sm-5">
					<input type="text" class="form-control col-sm-5" id="add_participant_birthday_picker" />
				</div>
				<span class="help-block col-sm-5" id="add_participant_birthday_error"></span>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Teilnehmer hinzuf&uuml;gen"</button>
		</form>
	</div>
	<div id="editParticipantFormDiv" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editParticipantFormLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" onclick="closeEditparticipantDialog()" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="editParticipantFormLabel">Teilnehmer bearbeiten</h4>
				</div>
				<div class="modal-body">
					<form id="editParticipantForm" name="editParticipantForm" class="form-horizontal" role="form">
						<input type="hidden" id="edit_participant_id" />
						<div class="form-group">
							<label class="col-sm-2 control-label">Nickname</label>
							<div class="col-sm-5">
								<p class="form-control-static" id="edit_participant_nickname"></p>
							</div>
							<span class="help-block col-sm-5"></span>
						</div>
						<div class="form-group" id="edit_participant_name_div">
							<label class="control-label col-sm-2" for="edit_participant_name">Name</label>
							<div class="col-sm-5">
								<input type="text" class="form-control col-sm-5" id="edit_participant_name" />
							</div>
							<span class="help-block col-sm-5" id="edit_participant_name_error"></span>
						</div>
						<div class="form-group" id="edit_participant_firstname_div">
							<label class="control-label col-sm-2" for="edit_participant_firstname">Vorname</label>
							<div class="col-sm-5">
								<input type="text" class="form-control col-sm-5" id="edit_participant_firstname" />
							</div>
							<span class="help-block col-sm-5" id="edit_participant_firstname_error"></span>
						</div>
						<div class="form-group" id="edit_participant_email_div">
							<label class="control-label col-sm-2" for="edit_participant_email">Email</label>
							<div class="col-sm-5">
								<input type="email" class="form-control col-sm-5" id="edit_participant_email" />
							</div>
							<span class="help-block col-sm-5" id="edit_participant_email_error"></span>
						</div>
						<div class="form-group" id="edit_participant_birthday_div">
							<label class="control-label col-sm-2" for="edit_participant_birthday_picker">Geburtstag</label>
							<div class="col-sm-5">
								<input type="text" class="form-control col-sm-5" id="edit_participant_birthday_picker" />
							</div>
							<span class="help-block col-sm-5" id="edit_participant_birthday_error"></span>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" onclick="closeEditparticipantDialog()">Abbrechen</button>
					<button type="button" class="btn btn-primary" onclick="checkEditParticipant()">Teilnehmer bearbeiten</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><?php }} ?>
