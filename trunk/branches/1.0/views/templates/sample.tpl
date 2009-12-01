{include file="header.tpl"}
<form >
{html_select_date start_year=1998 end_year=2010}
</form>
{$val}

This is an example of the html_select_time function:

<form>
{html_select_time use_24_hours=false}
</form>

This is an example of the html_options function:

<form>
<select name=states>
{html_options values=$option_values selected=$option_selected output=$option_output}
</select>
</form>

<select name="top5" size="5" multiple>
<option>David Hallyday</option>
<option>Michael Jackson</option>
<option>Michel Jonasz</option>
<option>Céline Dion</option>
<option>Patrick Bruel</option>
</select>

{include file="footer.tpl"}