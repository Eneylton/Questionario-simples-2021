<?php 

require __DIR__.'../../../vendor/autoload.php';

use \App\Entidy\Questao;
use App\Entidy\Resposta;
use  \App\Session\Login;


Login::requireLogin();

$id_questao = $_GET['id_questao'];

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Resposta:: getID('*','respostas',$_GET['id'],null,null);


if(!$value instanceof Resposta){
    header('location: index.php?status=error');

    exit;
}

if(isset($_GET['resp'])){
    
    $value->resp = $_GET['resp'];
    $value-> atualizar();

    header('location: resposta-list.php?id='.$id_questao);

    exit;
}


