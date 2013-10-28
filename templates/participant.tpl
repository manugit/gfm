<div id="participant_page" {if $displayedPage != "participant_page"}style="display: none;"{/if}>
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
		{section name=user loop=$users}
			<tr id="{$users[user].id}">
				<td>{$users[user].name}</td>
				<td class="clickable" onclick="removeParticipantFromPot('{$users[user].id}')">X</td>
				<td>E</td>
				<td>{$users[user].firstname}</td>
				<td>{$users[user].email}</td>
				<td>{$users[user].birthday}</td>
			</tr>
		{/section}
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
</div>