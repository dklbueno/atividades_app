<?php

class Status extends Conexao {
    
    private $_name = "status";
    private $_primaryKey = "id";
    
    public function getAll(){
        return parent::executar("SELECT * FROM {$this->_name} ORDER BY {$this->_primaryKey} ASC");
    }
    
}
