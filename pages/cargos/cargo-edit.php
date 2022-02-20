<?php 

require __DIR__.'../../../vendor/autoload.php';

define('TITLE','Editar Usuários');
define('BRAND','Editar Usuários');

use App\Entidy\Cargo;
use App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Cargo:: getID('*','cargos',$_GET['id'],null,null);


if(!$value instanceof Cargo){
    header('location: index.php?status=error');

    exit;
}



if(isset($_GET['descricao'])){
    
    $value->descricao = $_GET['descricao'];
    $value-> atualizar();

    header('location: cargo-list.php?status=edit');

    exit;
}


