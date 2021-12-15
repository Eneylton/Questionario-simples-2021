<?php 

require __DIR__.'../../../vendor/autoload.php';

define('TITLE','Novo Usuário');
define('BRAND','Cadastrar Usuário');

use App\Entidy\Avaliacao;
use App\Session\Login;

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();


if(isset($_POST['titulo'])){

        $item = new Avaliacao;
        $item->titulo = $_POST['titulo'];
        $item->cadastar();

        header('location: avaliacao-list.php?status=success');
        exit;
    }
