<?php
header('Content-type: application/json');

$Atividade = new Atividades();

$rtn = $Atividade->submeter($_POST);

echo json_encode($rtn);