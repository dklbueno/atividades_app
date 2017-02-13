<?php


class VwAtividades extends Conexao {
    
    private $_name = "vw_atividades";
    private $_primaryKey = "id";

    public function getAll() {
        return parent::executar("SELECT * FROM {$this->_name} ORDER BY {$this->_primaryKey} ASC");
    }

}
