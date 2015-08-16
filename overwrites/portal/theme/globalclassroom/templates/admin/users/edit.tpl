{include file="header.tpl"}
{$app=gcr::getApp()}
<div id="edituser">
    {if $suspended}
    <div class="message">
      <h4>{$suspendedby}</h4>
      {if $user->get('suspendedreason')}
      <div id="suspendreason">
        <h5>{str tag="suspendedreason" section="admin"}:</h5>
        {$user->suspendedreason}
      </div>
      {/if}
      {$suspendform2|safe}
    </div>
    {/if}

<table class="fullwidth" id="useraccountsettingsleft">
<tr><td class="center">
    <div id="profilepict">
        <a href="{profile_url($user)}"><img src="{profile_icon_url user=$user maxheight=100 maxwidth=100}" alt=""></a>
        <div id="profilename"><a href="{profile_url($user)}">{$user|display_name}</a></div>
        <div id="accounting"><a href="{$app->getUrl()}/account/view?user={$user->id}">View Transactions</a></div>
        {if $loginas}
           <br /> 
           <div id="loginas"><a class="btn" href="{$WWWROOT}admin/users/changeuser.php?id={$user->id}">{str tag=loginas section=admin}</a></div>
        {/if}
    </div>
    </td>
    <td id="useraccountsettingsleft"><h2>{str tag="siteaccountsettings" section="admin"}</h2>
    <p>{str tag="usereditdescription" section="admin"}</p>
    <p class="errmsg">{str tag="usereditwarning" section="admin"}</p>
    {$siteform|safe}
    <hr />
    {if ($institutions)}
    <div id="institutions">
    	<h2>{str tag="institutionsettings" section="admin"}</h2>
    	<p>{str tag="institutionsettingsdescription" section="admin"}</p>
        {$institutionform|safe}
    </div>
    {/if}
    </td>
    <td id="useraccountsettingsright">
    {if $suspendable}
    <div id="suspenddelete">
    	<div id="suspend">
        	<h3>{str tag="suspenduser" section=admin}</h3>
            {$suspendform|safe}
     	</div>
		{if $deletable}
        <div id="delete">
            <h3>{str tag=deleteuser section=admin}</h3>
            <p>{str tag=deleteusernote section=admin}</p>
            {$deleteform|safe}
        </div>
		{/if}
    </div>
    {/if}

    </td>
    </tr></table>
</div>

{include file="footer.tpl"}
