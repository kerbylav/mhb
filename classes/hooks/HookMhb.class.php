<?php
/*-------------------------------------------------------
*
*   Must Have Blogs.
*   Copyright © 2012 Alexei Lukin
*
*--------------------------------------------------------
*
*   Official site: imthinker.ru/stickytopics2
*   Contact e-mail: kerbylav@gmail.com
*
---------------------------------------------------------
*/

class PluginMhb_HookMhb extends Hook
{

    public function RegisterHook()
    {
        $this->AddHook('template_admin_action_item', 'AddAdminEditMenu');
    }

    public function AddAdminEditMenu($aParams)
    {
        $res=$this->Viewer_Fetch($this->PluginMhb_Main_GetTemplateFilePath(__CLASS__, 'admin_edit_menu.tpl'));
        return $res;
    }

}
?>
