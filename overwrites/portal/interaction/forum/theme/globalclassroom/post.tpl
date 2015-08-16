{if $post->deleted}
<h4 class="deletedpost">{str tag="postbyuserwasdeleted" section="interaction.forum" args=display_name($post->poster)}</h4>
{else}
{if $post->parent}
{include file="interaction:forum:simplepost.tpl" post=$post groupadmins=$groupadmins}
{else}
{include file="interaction:forum:simplepost.tpl" post=$post groupadmins=$groupadmins nosubject=true}
{/if}
{/if}
{if $children}
<div class="postreply">
{foreach from=$children item=child}
        {$child|safe}
{/foreach}
</div>
{/if}
