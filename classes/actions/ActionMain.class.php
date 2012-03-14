<?php
/*
 *
 * Project Name : Must Have Blogs
 * Copyright (C) 2011 Alexei Lukin. All rights reserved.
 * License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */


class PluginMHB_ActionMain extends ActionPlugin {
	/**
	 * Текущий юзер
	 *
	 * @var ModuleUser_EntityUser
	 */
	protected $oUserCurrent=null;

	/**
	 *
	 * Массив блоков.
	 *
	 * @var unknown_type
	 */
	protected $aBlocks=array();

	/**
	 * Инициализация
	 *
	 * @var bool
	 */
	protected $bIsAdmin=false;

	/**
	 * Инициализация
	 *
	 * @return null
	 */
	public function Init() {
		$this->sMenuHeadItemSelect='mhb';
		$this->sMenuItemSelect='mhb';
		$this->sMenuSubItemSelect='view';

		/**
		 * Проверяем авторизован ли юзер
		 */
		if ($this->User_IsAuthorization()) {
			$this->oUserCurrent=$this->User_GetUserCurrent();
			$this->bIsAdmin=$this->oUserCurrent->isAdministrator();
		}

		if (!$this->bIsAdmin)
		{
			return parent::EventNotFound();
		}

		$this->Viewer_AppendStyle(Plugin::GetTemplateWebPath('PluginMHB').'css/style.css');
		$this->aBlocks['right'][] = Plugin::GetTemplatePath('mhb').'block.info.tpl';
		$this->SetDefaultEvent('view');
	}

	protected function RegisterEvent() {
		$this->AddEvent('view','EventView');
	}

	public function EventView() {
		$aBlogs=$this->Blog_GetBlogs();

		if (isPost('submit_mhb'))
		{
			$this->PluginMHB_ModuleMain_DeleteAllMhb();

			foreach ($_REQUEST as $key=>$var)
			{
				$oMhb=null;

				if (strpos($key,'mhb_auto_join_')===0)
				{
					$iBlogId=substr($key,14);
					$oMhb=$this->PluginMHB_ModuleMain_GetMhbByBlogId($iBlogId);
					if (!$oMhb)
					{
						$oMhb=Engine::GetEntity('PluginMHB_Main_Mhb');
						$oMhb->setBlogId($iBlogId);
						$oMhb->setAutoJoin(1);
						$oMhb->setCantLeave(0);
						$this->PluginMHB_ModuleMain_AddMhb($oMhb);
					}
					else {
						$oMhb->setAutoJoin(1);
						$this->PluginMHB_ModuleMain_UpdateMhb($oMhb);
					}
				}

				if (strpos($key,'mhb_cant_leave_')===0)
				{
					$iBlogId=substr($key,15);
					$oMhb=$this->PluginMHB_ModuleMain_GetMhbByBlogId($iBlogId);
					if (!$oMhb)
					{
						$oMhb=Engine::GetEntity('PluginMHB_Main_Mhb');
						$oMhb->setBlogId($iBlogId);
						$oMhb->setAutoJoin(0);
						$oMhb->setCantLeave(1);
						$this->PluginMHB_ModuleMain_AddMhb($oMhb);
					}
					else {
						$oMhb->setCantLeave(1);
						$this->PluginMHB_ModuleMain_UpdateMhb($oMhb);
					}
				}
			}
		}

		$aMhb=$this->PluginMHB_ModuleMain_GetAllMhb();

		$aData=array();
		foreach ($aBlogs as $oBlog)
		{
			$data['blog_id']=$oBlog->getId();
			$data['title']=$oBlog->getTitle();
			$data['closed']=$oBlog->getType()=='close';
			$data['auto_join']=false;
			$data['cant_leave']=false;
			if (isset($aMhb[$oBlog->getId()]))
			{
				$data['auto_join']=$aMhb[$oBlog->getId()]->getAutoJoin();
				$data['cant_leave']=$aMhb[$oBlog->getId()]->getCantLeave();
			}

			$aData[]=$data;
		}
		$this->Viewer_Assign("aData",$aData);
	}

	public function EventShutdown() {
		$this->Viewer_Assign('sMenuHeadItemSelect', $this->sMenuHeadItemSelect);
		$this->Viewer_Assign('sMenuItemSelect', $this->sMenuItemSelect);
		$this->Viewer_Assign('sMenuSubItemSelect', $this->sMenuSubItemSelect);
		$this->Viewer_Assign('bIsAdmin', $this->bIsAdmin);
		$this->Viewer_Assign('oUserCurrent', $this->oUserCurrent);
		$this->Viewer_Assign('sTemplatePath', Plugin::GetTemplatePath('PluginMHB'));
		foreach ($this->aBlocks as $sGroup=>$aGroupBlocks) {
			$this->Viewer_AddBlocks($sGroup, $aGroupBlocks);
		}
	}
}
?>