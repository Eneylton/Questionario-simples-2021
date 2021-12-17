<?php 

require __DIR__.'../../../vendor/autoload.php';

use App\Entidy\Resposta;
use App\Session\Login;

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

$id_questao = $_GET['id'];
$id_avaliacao = $_GET['id_avaliacao'];
$id_tipo = $_GET['tipo_id'];


Login::requireLogin();

if(isset($_GET['resp1'])){

       
        
        if(!empty($_GET['resp1'])){

            $item = new Resposta;

            $item->resp = $_GET['resp1'];
            $item->questao_id = $_GET['id'];
            $item->tipo_id = $_GET['tipo_id'];
            $item->cadastar();

        }
        
        if(!empty($_GET['resp2'])){

            $item1 = new Resposta;

            $item1->resp = $_GET['resp2'];
            $item1->questao_id = $_GET['id'];
            $item1->tipo_id = $_GET['tipo_id'];
            $item1->cadastar();

        }
        
        if(!empty($_GET['resp3'])){

            $item2 = new Resposta;
            $item2->resp = $_GET['resp3'];
            $item2->questao_id = $_GET['id'];
            $item2->tipo_id = $_GET['tipo_id'];
            $item2->cadastar();

        }
        
        if(!empty($_GET['resp4'])){
            $item3 = new Resposta;
            $item3->resp = $_GET['resp4'];
            $item3->questao_id = $_GET['id'];
            $item3->tipo_id = $_GET['tipo_id'];
            $item3->cadastar();

        }
        
        if(!empty($_GET['resp5'])){
            $item4 = new Resposta;
            $item4->resp = $_GET['resp5'];
            $item4->questao_id = $_GET['id'];
            $item4->tipo_id = $_GET['tipo_id'];
            $item4->cadastar();

        }
        
        if(!empty($_GET['resp6'])){
            $item5 = new Resposta;
            $item5->resp = $_GET['resp6'];
            $item5->questao_id = $_GET['id'];
            $item5->tipo_id = $_GET['tipo_id'];
            $item5->cadastar();

        }

            $item6 = new Resposta;
            $item6->questao_id = $_GET['id'];
            $item6->tipo_id = $_GET['tipo_id'];
            $item6->cadastar();


        header('location: questao-list.php?id='.$id_avaliacao);
        exit;
    }
  	