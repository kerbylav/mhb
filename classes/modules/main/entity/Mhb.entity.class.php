<?php
/*
 *
 * Project Name : Must Have Blogs
 * Copyright (C) 2011 Alexei Lukin. All rights reserved.
 * License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */


class PluginMhb_ModuleMain_EntityMhb extends Entity
{
    public function getId() {
        return $this->_aData['mhb_id'];
    }
    public function getBlogId() {
        return $this->_aData['blog_id'];
    }
    public function getAutoJoin() {
        return $this->_aData['auto_join'];
    }
    public function getCantLeave() {
        return $this->_aData['cant_leave'];
    }


    public function setId($data) {
        $this->_aData['mhb_id']=$data;
    }
    public function setBlogId($data) {
        $this->_aData['blog_id']=$data;
    }
    public function setAutoJoin($data) {
        $this->_aData['auto_join']=$data?$data:0;
    }
    public function setCantLeave($data) {
        $this->_aData['cant_leave']=$data?$data:0;
    }
}
?>
