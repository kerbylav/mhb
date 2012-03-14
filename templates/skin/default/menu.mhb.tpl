<ul class="menu">
    <li {if $sMenuItemSelect=='mhb'}class="active"{/if}>
        <a href="{router page=mhb}">{$aLang.mhb_menu_mhb}</a>
	{if $sMenuItemSelect=='mhb'}
        <ul class="sub-menu" >
            <li {if $sMenuSubItemSelect=='list' || $sMenuSubItemSelect==''}class="active"{/if}><div><a href="{router page=mhb}list/">{$aLang.mhb_menu_mhb_list}</a></div></li>
            <li {if $sMenuSubItemSelect=='add' || $sMenuSubItemSelect==''}class="active"{/if}><div><a href="{router page=mhb}add/">{$aLang.mhb_menu_mhb_add}</a></div></li>
        </ul>
	{/if}
    </li>
</ul>
