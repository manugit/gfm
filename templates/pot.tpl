<div id="pot_page" {if $displayedPage != "pot_page"}style="display: none;"{/if}>
	<p>Anzahl Ausgaben: {$products|count}<br />Pot g&uuml;ltig von {$pot.startDate} bis {$pot.endDate}</p>
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
</div>