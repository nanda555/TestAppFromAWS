{include file="header.tpl"}
    <div class="rbuttons">
        <form action="{$WWWROOT}view/sharedviews.php" method="post">
            <input type="submit" class="submit" id="shared_pages_submit" name="submit" value="{str tag=sharedviews section=view}">
        </form>
        <form action="{$WWWROOT}view/share.php" method="post">
            <input type="submit" class="submit" id="share_page_submit" name="submit" value="{str tag=sharethispage section=globalclassroom}">
        </form>
        {$createviewform|safe}
        <form action="{$WWWROOT}view/choosetemplate.php" method="post">
            <input type="submit" class="submit" value="{str tag="copyaview" section="view"}">
        </form>
    </div>
{$helptext|safe}
<div id="copyview">

 <div id="templatesearch" class="searchlist">

  <form class="searchquery" action="{$WWWROOT}view/choosetemplate.php" method="post">

    <label>{str tag="searchviews" section="view"}:</label>
    <input type="text" name="viewquery" id="viewquery" class="query" value="{$views->query}">
    <button class="query-button" type="submit">{str tag="go"}</button>

    <input type="hidden" name="viewlimit" value="{$views->limit}">
    <input type="hidden" name="viewoffset" value="0">
    {if $views->group}<input type="hidden" name="group" value="{$views->group}">{/if}
    {if $views->institution}<input type="hidden" name="institution" value="{$views->institution}">{/if}

    <br>
	<label>{str tag="searchowners" section="view"}:</label>
    <input type="text" name="ownerquery" id="ownerquery" class="query" value="{$owners->query}">
    <button class="query-button" type="submit">{str tag="go"}</button>

  </form>
  <div id="templatesearch_table">{$views->html|safe}</div>
  {$views->pagination.html|safe}
 </div>

</div>
{include file="footer.tpl"}
