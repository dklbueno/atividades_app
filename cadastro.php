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
          <a class="navbar-brand" href="index.php">Atividades App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="listagem.php">Listagem</a></li>
            <li class="active"><a href="#">Cadastro</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" >

        <div class="page-header">
            <h1>Atividades - <small><?php if(isset($_GET['id'])) : ?>Editando<?php else : ?>Cadastrando<?php endif; ?></small></h1>
        </div>
      
        <div class="loading" style="display: none;">
            <center>
                <img src="img/loading.gif"  title="Carregando, Aguarde..." />
            </center>
        </div>
        <?php
            if(isset($_GET['id'])){
                $Atividade = new Atividades();
                $objStmt = $Atividade->get($_GET['id']);
                $atividade = $objStmt->fetchObject();
            }
        ?>
        <form class="form-horizontal" onsubmit="return fncAtividadesSubmeter(this)" action="#">
            <?php if(isset($atividade)) : ?>
            <input type="hidden" name="id" value="<?php echo $atividade->id; ?>" />
            <?php endif; ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nome *:</label>
                <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" placeholder="Nome *" maxlength="255" <?php if(isset($atividade)) : ?> value="<?php echo $atividade->nome; ?>" <?php endif; ?> />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Descrição *:</label>
                <div class="col-sm-10">
                    <textarea name="descricao" class="form-control" placeholder="Descrição *" maxlength="600"><?php if(isset($atividade)) : echo $atividade->descricao; endif; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Data Inicio *:</label>
                <div class="col-sm-4">
                    <input type="text" name="data_inicio" class="form-control" placeholder="Data Inicio *" <?php if(isset($atividade)) : ?> value="<?php echo implode("/",array_reverse(explode("-",$atividade->data_inicio))); ?>" <?php endif; ?>/>
                </div>
                <label class="col-sm-2 control-label">Data Fim</label>
                <div class="col-sm-4">
                    <input type="text" name="data_fim" class="form-control" placeholder="Data Fim" <?php if(isset($atividade) && !is_null($atividade->data_fim)) : ?> value="<?php echo implode("/",array_reverse(explode("-",$atividade->data_fim))); ?>" <?php endif; ?> />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Status *:</label>
                <div class="col-sm-10">
                    <select name="status" class="form-control">
                        <optgroup label="Selecione o Status">
                            <?php
                                $Status = new Status();
                                $objStmt = $Status->getAll();
                                while($status = $objStmt->fetchObject()) : 
                                    if(isset($atividade) && $status->id == $atividade->idstatus) :
                                        ?><option value="<?php echo $status->id; ?>" selected ><?php echo $status->nome; ?></option><?php
                                    else :
                                        ?><option value="<?php echo $status->id; ?>"><?php echo $status->nome; ?></option><?php    
                                    endif;
                                endwhile;
                            ?>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Situação *:</label>
                <div class="col-sm-10">
                    <select name="situacao" class="form-control">
                        <optgroup label="Selecione a Situação">
                            <option value="1" <?php if(isset($atividade) && $atividade->situacao == '1') :?> selected <?php endif; ?>>Ativo</option>
                            <option value="0" <?php if(isset($atividade) && $atividade->situacao == '0') :?> selected <?php endif; ?>>Inativo</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            
            <div class="pull-right">
                <a href="listagem.php" class="btn btn-default">Cancelar</a>
                <input type="button" class="btn btn-default" value="Resetar" />
                <input type="submit" class="btn btn-primary" value="Submeter" />
            </div>
            
        </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.min.map"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/toastr.min.js"></script>
    <script type="text/javascript" src="js/atividades.js"></script>
  </body>
</html>
