<?php 

require __DIR__.'../../../vendor/autoload.php';

use \App\Entidy\Questao;
use  \App\Session\Login;


Login::requireLogin();

$id_avaliacao = $_GET['id_avaliacao2'];

if(!isset($_GET['id2']) or !is_numeric($_GET['id2'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Questao:: getID('*','questao',$_GET['id2'],null,null);


if(!$value instanceof Questao){
    header('location: index.php?status=error');

    exit;
}

if(isset($_GET['descricao'])){
    
    $value->descricao = $_GET['descricao'];
    $value-> atualizar();

    header('location: questao-list.php?id='.$id_avaliacao);

    exit;
}


