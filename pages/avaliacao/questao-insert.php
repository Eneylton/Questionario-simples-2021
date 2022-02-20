<?php 

require __DIR__.'../../../vendor/autoload.php';

define('TITLE','Novo Usuário');
define('BRAND','Cadastrar Usuário');

use App\Entidy\Questao;
use App\Entidy\Resposta;
use App\Session\Login;

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

$id_avaliacao = $_POST['id_avaliacao'];
$id_questao = 0;

Login::requireLogin();

if(isset($_POST['descricao'])){

        $item = new Questao;
        $item->descricao = $_POST['descricao'];
        $item->avaliacao_id = $_POST['id_avaliacao'];
        $item->cadastar();

        $id_questao = $item->id; 
     
    }

    if(isset($_POST['opcao'])){

     foreach ($_POST['opcao'] as $result) {
       
        $item = new Resposta;
        $item->resp = $result;
        $item->tipo_id = $_POST['tipo_id'];
        $item->questao_id = $id_questao;
        $item->cadastar();
         
     }

        header('location: questao-list.php?id='.$id_avaliacao);
        exit;

    }
  	