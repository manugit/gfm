<div id="{$scopeLowerCase}Item_page">
	<form id="{$scopeLowerCase}ItemForm" name="{$scopeLowerCase}ItemForm" onsubmit="check{$scopeUpperCase}Item(this); return false;">
		<input type="hidden" name="id" />
		<table>
			<tbody id="{$scopeLowerCase}_item_tbody">
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
					<td><input type="text" name="date" id="{$scopeLowerCase}_item_date_picker" /></td>
					<td id="date_error"></td>
				</tr>
				<tr>
					<td>Zahler</td>
					<td>
						<select name="buyer" id="{$scopeLowerCase}_item_buyer">
						{section name=user loop=$users}
							<option value="{$users[user].name}" id="{$scopeLowerCase}_item_option_{$users[user].name}">{$users[user].name}</option>
						{/section}	
						</select>
					<td id="buyer_error"></td>
				</tr>
				<tr>
					<td>Konsumation</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				{section name=user loop=$users}
					<tr id="{$scopeLowerCase}_item_{$users[user].name}">
						<td>&nbsp;</td>
						<td>{$users[user].name}<div class="percentageDiv"><input type="text" name="{$scopeLowerCase}_item_{$users[user].name}_percentage" id="{$scopeLowerCase}_item_{$users[user].name}_percentage" /> %</div></td>
						<td>&nbsp;</td>
					</tr>
				{/section}
			</tbody>
			<tfoot>
				<tr>
					<td>&nbsp;</td>
					<td id="{$scopeLowerCase}_item_error">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</tfoot>
		</table>
		
		<input type="submit" value="{$buttonText}">
	</form><button onclick="clear{$scopeUpperCase}ItemFormAndReturn()">Zur&uuml;ck zum Pot</button>
</div>