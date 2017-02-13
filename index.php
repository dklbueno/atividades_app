<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
include './database/models/Conexao.php';
include './database/models/Atividades.php';
include './database/validators/AtividadesValidator.php';
include './database/models/Status.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Atividades App - Teste Eduardo Júnior dos Santos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="css/toastr.min.css" rel="stylesheet"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" class="active">Atividades App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="listagem.php">Listagem</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" >

        <div class="jumbotron">
            <h1>Atividades App</h1>
            <p>
                Seja bem vindo ao <b>Atividades App</b>. Um aplicativo que foi desenvolvido apenas para fins de demonstração. 
                Logo, ele possui um número limitado de funcionalidades.<br />
                Os arquivos para criação da base de dados, estão na pasta <strong>src</strong> na raiz do projeto!<br />
                Espero que goste do app e, caso queira entrar em contato, email para <strong>mr.eduardosantos@gmail.com</strong>.
                
                <h2>Vamos Começar??</h2>
                
                <a href="cadastro.php" class="btn btn-link">Cadastrar uma nova atividade</a> ou <a href="listagem.php" class="btn btn-link">Listar atividades já cadastradas!</a>
            </p>
        </div>
        
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.min.map"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
