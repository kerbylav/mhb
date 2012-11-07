<?php
class PluginMHB_ModuleBlog extends PluginMHB_Inherit_ModuleBlog {

    public function DeleteRelationBlogUser(ModuleBlog_EntityBlogUser $oBlogUser) {
        if ($oMhb=$this->PluginMHB_ModuleMain_GetMhbByBlogId($oBlogUser->getBlogId())) {
            if (!$oMhb->getCantLeave()) {
                return parent::DeleteRelationBlogUser($oBlogUser);
            } else {
                $this->Message_AddErrorSingle($this->Lang_Get('plugin.mhb.mhb_cant_leave_blog'),$this->Lang_Get('attention'));
                return true;
            }
        }

        return parent::DeleteRelationBlogUser($oBlogUser);
    }
}
?>
