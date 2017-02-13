<?php

class Atividades extends Conexao {
    
    private $_name = "atividades";
    private $_primaryKey = "id";
    private $_validator = null;
    
    public function __construct() {
        $this->_validator = new AtividadesValidator();
    }
    
    public function get($id){
        return parent::executar("SELECT * FROM {$this->_name} WHERE {$this->_primaryKey} = {$id} LIMIT 1");
    }
    
    public function getAll(){
        return parent::executar("SELECT * FROM {$this->_name} ORDER BY {$this->_primaryKey} DESC");
    }
    
    public function submeter(array $data){
        try{
            $this->_validator->setData($data);
            $this->_validator->validate();
            return self::run($this->_validator->getValidateData());
        }catch(Exception $ex){
            return [
                'status' => 'error',
                'message' => 'Erro ao tentar submeter atividade: ' . $ex->getMessage()
            ];
        }
    }
    
    private function run(array $data){
        if(isset($data['id'])){
            $sql = "UPDATE {$this->_name} SET "
                    . "idstatus = {$data['status']},"
                    . "nome = '{$data['nome']}',"
                    . "descricao = '{$data['descricao']}',"
                    . "data_inicio = '{$data['data_inicio']}',"
                    . "data_fim = {$data['data_fim']},"
                    . "situacao = '{$data['situacao']}'"
                    . "WHERE {$this->_primaryKey} = {$data['id']}";
            $msg = "Atividade Atualizada com sucesso!";
        }else{
            $sql = "INSERT INTO {$this->_name} VALUES(default, {$data['status']}, '{$data['nome']}', '{$data['descricao']}', '{$data['data_inicio']}', {$data['data_fim']}, '{$data['situacao']}')";
            $msg = "Atividade Cadastrada com sucesso!";
        }
        
        //echo $sql; exit;
        
        parent::executar($sql);
        
        return [
            'status' => 'success',
            'message' => $msg
        ];
    }
    
}
