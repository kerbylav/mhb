<?php
class PluginMHB_ModuleUser extends PluginMHB_Inherit_ModuleUser {

    public function Add(ModuleUser_EntityUser $oUser) {
        if ($nUser=parent::Add($oUser)) {
            $sId=$nUser->getId();

            $aMhb=$this->PluginMHB_ModuleMain_GetAllMhb();

            foreach ($aMhb as $oMhb) {
                if ($oMhb->getAutoJoin()) {
                    if ($oBlog=$this->Blog_GetBlogById($oMhb->getBlogId())) {
                        $oBlogUserNew=Engine::GetEntity('Blog_BlogUser');
                        $oBlogUserNew->setUserId($sId);
                        $oBlogUserNew->setUserRole(ModuleBlog::BLOG_USER_ROLE_USER);
                        $oBlogUserNew->setBlogId($oBlog->getId());
                        $bResult = $this->Blog_AddRelationBlogUser($oBlogUserNew);
                        if ($bResult) {
                            $oBlog->setCountUser($oBlog->getCountUser()+1);
                            $this->Blog_UpdateBlog($oBlog);
                        }
                    }
                }
            }

            return $nUser;
        }

        return false;
    }
}
?>
