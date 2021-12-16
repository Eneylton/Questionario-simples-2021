<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Entidy\Avaliacao;
use App\Entidy\Questao;
use App\Entidy\Resposta;
use App\Session\Login;

Login::requireLogin();

$resultados = "";
$resultados2 = "";
$respostas = "";
$quest = "";
$id_pergunta = 0;
$contador = 0;

$avaliacao_id = $_GET['id'];

$result = Avaliacao :: getID('*','avaliacao',$avaliacao_id,null,null);

$titulo = $result->titulo;

define('TITLE',$titulo);
define('BRAND','Avaliação');

$perguntas = Questao :: getList('*','questao','avaliacao_id='.$avaliacao_id);

foreach ($perguntas as $item) {
    $contador += 1;

    $id_pergunta = $item->id;
    $quest = $item->descricao;

    $result = Resposta :: getList('*','respostas','questao_id='.$item->id,null,null);

    foreach ($result as $value) {

        $respostas = $value->resp;
 
    }

}    

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/avaliacao/questionario-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>

