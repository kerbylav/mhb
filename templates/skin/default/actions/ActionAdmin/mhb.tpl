{include file='header.tpl'}
<div class="mhb form">
    <form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="security_ls_key" value="{$LIVESTREET_SECURITY_KEY}" />

	<table class="table table-plugins">
		<thead>
            <tr>
                <th>{$aLang.plugin.mhb.mhb_blog_title}</th>
                <th>{$aLang.plugin.mhb.mhb_auto_join_title}</th>
                <th>{$aLang.plugin.mhb.mhb_cant_leave_title}</th>
            </tr>
		</thead>
		
		<tbody>
            {foreach from=$aData item=data}
            <tr>
                <td>{if $data.closed}[*] {/if}{$data.title|escape:html}</td>
                <td class="mhb_checkbox cell-checkbox"><input type="checkbox" name="mhb_auto_join_{$data.blog_id}" class="checkbox" {if $data.auto_join}checked{/if}></td>
                <td class="mhb_checkbox cell-checkbox"><input type="checkbox" name="mhb_cant_leave_{$data.blog_id}" class="checkbox" {if $data.cant_leave}checked{/if}></td>
            </tr>
            {/foreach}
		</tbody>
	</table>
     <div>{$aLang.plugin.mhb.mhb_note}</div>
      <input type="submit" class="button" name="submit_mhb" value="{$aLang.plugin.mhb.mhb_submit}" />
    </form>
</div>
{include file='footer.tpl'}
