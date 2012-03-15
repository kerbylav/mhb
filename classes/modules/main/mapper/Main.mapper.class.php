<?php
/*
 *
 * Project Name : Must Have Blogs
 * Copyright (C) 2011 Alexei Lukin. All rights reserved.
 * License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */


Class PluginMHB_ModuleMain_MapperMain extends Mapper {

    public function AddMhb(PluginMHB_ModuleMain_EntityMhb $oMhb) {
        $sql = "INSERT INTO ".Config::Get('plugin.mhb.table.mhb')."
            (
                blog_id,
                auto_join,
                cant_leave
            )
            VALUES(?d,?,?)
        ";
        if (($iId=$this->oDb->query($sql,$oMhb->getBlogId(),$oMhb->getAutoJoin(),$oMhb->getCantLeave()))) {
            return $iId;
        }
        return false;
    }

    public function UpdateMhb(PluginMHB_ModuleMain_EntityMhb $oMhb) {
        $sql = "UPDATE ".Config::Get('plugin.mhb.table.mhb')."
            SET
                blog_id=?d,
                auto_join=?,
                cant_leave=?
            WHERE
            mhb_id=?
        ";
        if (($this->oDb->query($sql,$oMhb->getBlogId(),$oMhb->getAutoJoin(),$oMhb->getCantLeave(),$oMhb->getId()))) {
            return true;
        }
        return false;
    }

    public function DeleteMhb($iMhbId) {
        $sql = "DELETE FROM ".Config::Get('plugin.mhb.table.mhb')."
            WHERE
                mhb_id = ?d
        ";
        if ($this->oDb->query($sql,$iMhbId)) {
            return true;
        }
        return false;
    }

    public function DeleteAllMhb() {
        $sql = "DELETE FROM ".Config::Get('plugin.mhb.table.mhb');
        if ($this->oDb->query($sql)) {
            return true;
        }
        return false;
    }

    public function GetMhbByBlogId($iBlogId) {
        $sql = "SELECT * FROM ".Config::Get('plugin.mhb.table.mhb')." WHERE blog_id=?";
        if ($aRow=$this->oDb->selectRow($sql,$iBlogId)) {
            return Engine::GetEntity('PluginMHB_Main_Mhb',$aRow);
        }
        return false;
    }

    public function GetAllMhb() {
        $sql = "SELECT * FROM ".Config::Get('plugin.mhb.table.mhb');
        $aRes=array();
        if ($aRows=$this->oDb->select($sql)) {
            foreach ($aRows as $aRow) {
                $aRes[$aRow['blog_id']]=Engine::GetEntity('PluginMHB_Main_Mhb',$aRow);
            }
        }

        return $aRes;
    }

}
?>
