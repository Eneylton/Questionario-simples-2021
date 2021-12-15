<?php 

require __DIR__.'../../../vendor/autoload.php';

use App\Entidy\Resposta;
use App\Session\Login;

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

$id_questao = $_POST['id_avaliacao'];


Login::requireLogin();

if(isset($_POST['resp'])){

            $item = new Resposta;

            $item->resp = $_POST['resp'];
            $item->questao_id = $id_questao;
            $item->cadastar();

        header('location: resposta-list.php?id='.$id_questao );
        exit;
    }
  	