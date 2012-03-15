<?php
/*
 *
 * Project Name : Must Have Blogs
 * Copyright (C) 2011 Alexei Lukin. All rights reserved.
 * License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */


/**
 * Модуль роботостатистики
 *
 */
class PluginMHB_ModuleMain extends Module {
    /**
     * Меппер для сохранения логов в базу данных и формирования выборок по данным из базы
     *
     * @var Mapper_Profiler
     */
    protected $oMapper;

    /**
     * Инициализация модуля
     */
    public function Init() {
        $this->oMapper=Engine::GetMapper(__CLASS__);
    }

    public function AddMhb(PluginMHB_ModuleMain_EntityMhb $oMhb) {
        return $this->oMapper->AddMhb($oMhb);
    }

    public function UpdateMhb(PluginMHB_ModuleMain_EntityMhb $oMhb) {
        return $this->oMapper->UpdateMhb($oMhb);
    }

    public function DeleteMhb($iMhbId) {
        return $this->oMapper->DeleteMhb($iMhbId);
    }

    public function DeleteAllMhb() {
        return $this->oMapper->DeleteAllMhb();
    }

    public function GetMhbByBlogId($iBlogId) {
        return $this->oMapper->GetMhbByBlogId($iBlogId);
    }

    public function GetAllMhb() {
        return $this->oMapper->GetAllMhb();
    }

}
?>
