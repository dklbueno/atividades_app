<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

spl_autoload_register(function($class){
    $directories = [
        '../database/models/',
        '../database/validators/'
    ];
    
    foreach($directories as $folder){
        if(file_exists($folder.$class.'.php'))
            include $folder.$class.'.php';
    }
});

include 'db/atividades/cadastro.php';