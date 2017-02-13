<?php

class Conexao {
    
    private $_engine = "mysql";
    private $_host = "localhost";
    private $_port = "3306";
    private $_dbname = "atividades_db";
    private $_user = "root";
    private $_pass = "mysql";
    private $_objConn = null;
    
    private function open(){
        $this->_objConn = new PDO("{$this->_engine}:host={$this->_host};dbname={$this->_dbname}", $this->_user, $this->_pass);
        $this->_objConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_objConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->_objConn->exec("set names utf8");
    }
    
    protected function executar($query){
        return self::run($query);
    }
    
    private function run($SQL){
        self::open();
        
        if(is_array($SQL)){
            foreach($SQL as $query){
                if(!empty($query) && !is_null($query)){
                    $objStmt = $this->_objConn->query($query);
                }
            }
        }else{
            $objStmt = $this->_objConn->query($SQL);
        }
        
        return $objStmt;
    }
    
    protected function close(){
        $this->_objConn = null;
    }
    
}
