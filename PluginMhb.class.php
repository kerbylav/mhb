<?php
/*
 * 
 * Project Name : Must Have Blogs
 * Copyright (C) 2011 Alexei Lukin. All rights reserved.
 * License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */


if (!class_exists('Plugin')) {
	die('Hacking attemp!');
}

define('MHB_VERSION', '1.0.0');

class PluginMHB extends Plugin
{
	protected $sTemplatesUrl = "";

 	protected $aInherits=array(
        'module' => array(
                'ModuleUser'=>'PluginMHB_ModuleUser',
                'ModuleBlog'=>'PluginMHB_ModuleBlog',
 	),
    );
        
	public function Activate()
	{
		if (!$this->isTableExists('prefix_mhb')) {
			$this->ExportSQL(dirname(__FILE__).'/install.sql');
		}

		return true;
	}


	public function Deactivate()
	{
		return true;
	}

	public function Init()
	{
		$sTemplatesUrl = Plugin::GetTemplatePath('PluginMHB');
	}

}

?>
