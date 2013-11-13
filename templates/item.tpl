<div id="{$scopeLowerCase}Item_page" {if $displayedPage != "{$scopeLowerCase}Item_page"}style="display: none;"{/if}>
	<form id="{$scopeLowerCase}ItemForm" onsubmit="check{$scopeUpperCase}Item(); return false;" class="form-horizontal" role="form">
		{if isset($editProduct)}<input type="hidden" id="{$scopeLowerCase}_item_id" value="{$editProduct.rowId}" />{/if}
		<div class="form-group" id="{$scopeLowerCase}_item_name_div">
			<label class="control-label col-sm-2" for="{$scopeLowerCase}_item_name">Name</label>
			<div class="col-sm-5">
				<input type="text" class="form-control col-sm-5" id="{$scopeLowerCase}_item_name" {if isset($editProduct)}value="{$editProduct.name}" {/if}>
			</div>
			<span class="help-block col-sm-5" id="{$scopeLowerCase}_item_name_error"></span>
		</div>
		<div class="form-group" id="{$scopeLowerCase}_item_amount_div">
			<label class="control-label col-sm-2" for="{$scopeLowerCase}_item_amount">Betrag</label>
			<div class="col-sm-5">
				<input type="text" class="form-control col-sm-5" id="{$scopeLowerCase}_item_amount" {if isset($editProduct)}value="{$editProduct.price}" {/if}>
			</div>
			<span class="help-block col-sm-5" id="{$scopeLowerCase}_item_amount_error"></span>
		</div>
		<div class="form-group" id="{$scopeLowerCase}_item_date_div">
			<label class="control-label col-sm-2" for="{$scopeLowerCase}_item_date_picker">Datum</label>
			<div class="col-sm-5">
				<input type="text" class="form-control col-sm-5" id="{$scopeLowerCase}_item_date_picker" {if isset($editProduct)}value="{$editProduct.date}" {/if}>
			</div>
			<span class="help-block col-sm-5" id="{$scopeLowerCase}_item_date_error"></span>
		</div>
		<div class="form-group" id="{$scopeLowerCase}_item_buyer_div">
			<label class="control-label col-sm-2" for="{$scopeLowerCase}_item_buyer">Zahler</label>
			<div class="col-sm-5">
				<select class="form-control" id="{$scopeLowerCase}_item_buyer">
				{section name=user loop=$users}
					<option value="{$users[user].nickname}" id="{$scopeLowerCase}_item_option_{$users[user].nickname}"{if isset($editProduct) AND $users[user].nickname == $editProduct.buyer} selected{/if}>{$users[user].nickname}</option>
				{/section}	
				</select>
			</div>
			<span class="help-block col-sm-5" id="{$scopeLowerCase}_item_buyer_error"></span>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Konsumation</label>
			<div class="col-sm-10"></div>
		</div>
		<div id="edit_item_participants_consumptions">
		{section name=user loop=$users}
			<div class="form-group" id="{$scopeLowerCase}_item_{$users[user].nickname}_percentage_div">
				<label class="control-label col-sm-2" for="{$scopeLowerCase}_item_{$users[user].nickname}_percentage">{$users[user].nickname}</label>
				<div class="percentageDiv col-sm-5"><div class="percentageDiv col-sm-4">
					<input type="text" class="form-control" id="{$scopeLowerCase}_item_{$users[user].nickname}_percentage" {if isset($editProduct)}value="{100*$editProduct[$users[user].nickname]}" {/if}/>
				</div><label class="control-label col-sm-1"> %</label></div>
				<span class="help-block col-sm-5" id="{$scopeLowerCase}_item_{$users[user].nickname}_percentage_error"></span>
			</div>
		{/section}
		</div>
		<button type="submit" id="{$scopeLowerCase}_submit" class="btn btn-primary btn-block">{$buttonText}</button>
	</form>
</div>