<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>{$title}</title>
    <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
    <link rel="StyleSheet" href="./calendar_style.css" />
</head>
<body>

<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<table width="100%" border="0" cellpadding="3" cellspacing="0"><tr><td align="center">

<br />

<table style="background-color: #007AC2; border:none"  cellpadding="1" cellspacing="1">
<tr>
    <th style="color: #FFFFFF; font-size:10pt;" colspan="7">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td class="quote"><b>&nbsp;<a href="{$smarty.server.SCRIPT_NAME}?month={$month->month+1}&amp;year={$month->year}&amp;action=-1" class="gen">&laquo;</a>&nbsp;</b></td>
            <td align="center" width="100%">
                <select name="month" onchange="submit()">
                {foreach from=$cal_months item=cal_month}
                    <option value="{$cal_month.id}" {if ($month->month+1) == $cal_month.id}selected="selected"{/if}>
                        {$cal_month.name}
                    </option>
                {/foreach}
                </select>
                <select name="year" onchange="submit()">
                {foreach from=$cal_years item=cal_year}
                    <option value="{$cal_year}" {if $month->year == $cal_year}selected="selected"{/if}>{$cal_year}</option>
                {/foreach}
                </select>
            </td>
            <td class="quote"><b>&nbsp;<a href="{$smarty.server.SCRIPT_NAME}?month={$month->month+1}&amp;year={$month->year}&amp;action=+1" class="gen">&raquo;</a>&nbsp;</b></td>
        </tr>
    </table>
    </th>
</tr>
<tr class="day_name">
    <th>D</th>
    <th>L</th>
    <th>M</th>
    <th>M</th>
    <th>J</th>
    <th>V</th>
    <th>S</th>
</tr>
{foreach from=$month->weeks item=week}
<tr class="week">
    {foreach from=$week item=day}
        {if $month->days.$day->is_today()}
        <td class="today_date_box">
        {elseif ($month->days.$day->is_weekend())}
        <td class="weekend_box">
        {elseif ($month->days.$day->month != $month->get_month())}
        <td class="dark_date_box">
        {else}
        <td class="date_box">
        {/if}
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>&nbsp;
                    
                </td>
                <td align="right">
                    {$month->days.$day->day}<br />
                </td>
            </tr>
            </table>
        </td>
    {/foreach}
</tr>
{/foreach}
</table>

</td></tr></table>
</form>
</body>
</html>