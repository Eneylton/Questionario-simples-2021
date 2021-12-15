<?php 

require __DIR__.'../../../vendor/autoload.php';

use \App\Entidy\Resposta;
use  \App\Session\Login;

Login::requireLogin();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Resposta::getID('*','respostas',$_GET['id'],null,null);

if(!$value instanceof Resposta){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $value->excluir();

    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
  
     exit;
}

