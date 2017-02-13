<?php

class AtividadesValidator {
    
    private $_data = null;
    
    public function __construct(array $data = null) {
        $this->_data = $data;
    }
    
    public function setData(array $data){
        $this->_data = $data;
    }
    
    public function validate(){
        if(is_null($this->_data)){
            throw new Exception("Os dados precisam ser especificados!");
        }else{
            return self::checking();
        }
    }
    
    private function checking(){
        if(strlen($this->_data['nome']) <= 0 || strlen($this->_data['nome']) > 255)
            throw new Exception("O nome deve conter o máximo de 255 caracteres e mínimo de 1!");
        if(strlen($this->_data['descricao']) <= 0 || strlen($this->_data['descricao']) > 600)
            throw new Exception ("A descrição deve conter o máximo de 600 caracteres e mínimo de 1");
        if(!checkdate((int) explode("/", $this->_data['data_inicio'])[1], (int) explode("/", $this->_data['data_inicio'])[0], (int) explode("/", $this->_data['data_inicio'])[2]))
            throw new Exception ("A data de inicio precisa ser uma data válida!");
        if($this->_data['status'] == 4 && !empty($this->_data['data_fim']) && !is_null($this->_data['data_fim']) &&
           !checkdate((int) explode("/", $this->_data['data_fim'])[1], (int) explode("/", $this->_data['data_fim'])[0], (int) explode("/", $this->_data['data_fim'])[2]))
            throw new Exception ("A data de fim precisa ser uma data válida!");
        if(empty($this->_data['status']))
            throw new Exception ("Selecione o status da atividade!");
        if($this->_data['status'] == 4 && (empty($this->_data['data_fim']) || is_null($this->_data['data_fim'])))
            throw new Exception ("Você deve especificar a data de fim da atividade, já que a mesma esta concluida!");
        if($this->_data['situacao'] == '')
            throw new Exception("Selecione a situação da atividade!");
        
        return true;
    }
    
    public function getValidateData(){
        $this->_data['data_inicio'] = implode("-",array_reverse(explode("/",$this->_data['data_inicio'])));
        
        if(!empty($this->_data['data_fim']) && !is_null($this->_data['data_fim'])){
            $this->_data['data_fim'] = "'".implode("-",array_reverse(explode("/",$this->_data['data_fim'])))."'";
        }else{
            $this->_data['data_fim'] = 'NULL';
        }
        
        return $this->_data;
    }
    
}
