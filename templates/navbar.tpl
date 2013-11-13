<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/gfm/">GFM - Home</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li id="nav_pot_li" {if $displayedPage == "pot_page"}class="active" {/if}onclick="displayPotPage()"><a
					class="clickable">Pot &Uuml;bersicht</a></li>
				<li id="nav_participant_li" {if $displayedPage == "participant_page"}class="active" {/if}onclick="displayParticipantPage();"><a
					class="clickable">Teilnehmer bearbeiten</a></li>
				<li id="nav_addItem_li" {if $displayedPage == "addItem_page"}class="active" {/if}onclick="displayAddItemPage()"><a class="clickable">Ausgaben
						hinzuf&uuml;gen</a></li>
			</ul>
		</div>
	</div>
</div>