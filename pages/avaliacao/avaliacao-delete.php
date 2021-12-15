<?php 

require __DIR__.'../../../vendor/autoload.php';

use \App\Entidy\Avaliacao;
use   \App\Session\Login;

Login::requireLogin();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Avaliacao::getID('*','avaliacao',$_GET['id'],null,null);

if(!$value instanceof Avaliacao){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $value->excluir();

    header('location: avaliacao-list.php?status=del');

    exit;
}

