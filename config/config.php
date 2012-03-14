<?php
/*
 * 
 * Project Name : Must Have Blogs
 * Copyright (C) 2011 Alexei Lukin. All rights reserved.
 * License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */

$config=array();

$config['table']['mhb']                = '___db.table.prefix___mhb';

Config::Set('router.page.mhb', 'PluginMHB_ActionMain');

return $config;
?>