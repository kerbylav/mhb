<?php
class PluginMHB_ModuleBlog extends PluginMHB_Inherit_ModuleBlog {
	public function DeleteRelationBlogUser(ModuleBlog_EntityBlogUser $oBlogUser) {
			if ($oMhb=$this->PluginMHB_ModuleMain_GetMhbByBlogId($oBlogUser->getBlogId()))
			{
				if (!$oMhb->getCantLeave())	return parent::DeleteRelationBlogUser($oBlogUser);
				else return false;
			}
			else
			return parent::DeleteRelationBlogUser($oBlogUser);
	}
}
?>