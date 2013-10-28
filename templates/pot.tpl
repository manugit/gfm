<div id="pot_page" {if $displayedPage != "pot_page"}style="display: none;"{/if}>
	<p>Anzahl Ausgaben: {$products|count}<br />
		Pot g&uuml;ltig von {$pot.startDate} bis {$pot.endDate}</p>
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
</div>