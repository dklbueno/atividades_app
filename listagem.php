<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

include './database/models/Conexao.php';
include './database/models/VwAtividades.php';

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

        <link href="css/datatables.min.css" rel="stylesheet" />

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
                    <a class="navbar-brand" href="index.php">Atividades App</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Listagem</a></li>
                        <li><a href="cadastro.php">Cadastro</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container" >

            <div class="page-header">
                <h1>Atividades - <small>Listagem</small></h1>
            </div>

            <table id="listagem" class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data Inicio</th>
                        <th>Status</th>
                        <th>Situação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $Vw = new VwAtividades();
                        $objStmt = $Vw->getAll();
                        
                        while($atividade = $objStmt->fetchObject()) : 
                    ?>
                    <tr <?php if($atividade->idstatus == 4) : ?> class="success" <?php endif; ?>>
                        <td><?php echo $atividade->nome; ?></td>
                        <td><?php echo $atividade->data_inicio; ?></td>
                        <td><?php echo $atividade->status; ?></td>
                        <td><?php echo $atividade->situacao_nome; ?></td>
                        <td>
                            <?php if($atividade->idstatus != 4) : ?>
                            <a href="cadastro.php?id=<?php echo $atividade->id; ?>" class="btn btn-danger">Editar</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
            <a href="cadastro.php" class="btn btn-primary">Novo Cadastro</a>

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.1.1.min.map"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/datatables.min.js"></script>
        <script type="text/javascript" src="js/atividades.js"></script>
    </body>
</html>
