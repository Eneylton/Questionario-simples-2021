<?php 

require __DIR__.'../../../vendor/autoload.php';

define('TITLE','Novo Usuário');
define('BRAND','Cadastrar Usuário');

use App\Entidy\Questao;
use App\Session\Login;

Login::requireLogin();

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

if (isset($_POST['submit'])) {

    echo "primeiro passo !!!!";

}

$id_avaliacao = $_POST['id_avaliacao'];


if(isset($_POST['descricao'])){

        $item = new Questao;
        $item->descricao = $_POST['descricao'];
        $item->avaliacao_id = $_POST['id_avaliacao'];
        $item->cadastar();

        header('location: questao-list.php?id='.$id_avaliacao);
        exit;
    }
  	