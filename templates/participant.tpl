<div id="participant_page" {if $displayedPage != "participant_page"}style="display: none;"{/if}>
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
			{section name=user loop=$users}
				<tr id="{$users[user].id}">
					<td>{$users[user].nickname}</td>
					<td class="clickable" onclick="removeParticipant('{$users[user].id}', '{$users[user].nickname}')"><span class='glyphicon glyphicon-trash'></span></td>
					<td class="clickable" onclick="openEditParticipantDialog('{$users[user].nickname}')"><span class='glyphicon glyphicon-pencil'></span></td>
					<td>{$users[user].name}</td>
					<td>{$users[user].firstname}</td>
					<td>{$users[user].email}</td>
					<td>{$users[user].birthday}</td>
				</tr>
			{/section}
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
						<input type="hidden" name="edit_participant_id" />
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
</div>