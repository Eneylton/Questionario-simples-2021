<?php

require __DIR__ . '../../../vendor/autoload.php';

define('TITLE', 'Novo Usuário');
define('BRAND', 'Cadastrar Usuário');

use App\Entidy\QuestaoResp;
use App\Session\Login;

Login::requireLogin();

$usuariologado = Login::getUsuarioLogado();

$usuario = $usuariologado['id'];

if (isset($_POST['submit'])) {

    if (isset($_POST['id'])) {
        foreach ($_POST['id'] as $id) {

            $id  = intval($id);

            $item = new QuestaoResp;
            $item->avaliacao_id = $_POST['id_avaliacao'];
            $item->respostas_id  = $id;
            $item->questao_id = $_POST['id_pergunata'];
            $item->escrita = 0;
            $item->status = 1;
            $item->cadastar();
        }
    }

    if (isset($_POST['tipo'])) {
        foreach ($_POST['tipo'] as $id2) {

            $id2  = intval($id2);

            $item = new QuestaoResp;
            $item->avaliacao_id = $_POST['id_avaliacao'];
            $item->respostas_id  = $id2;
            $item->questao_id = $_POST['id_pergunata'];
            $item->escrita = 0;
            $item->status = 1;
            $item->cadastar();
        }
    }

    if (isset($_POST['escrita'])) {

        $item = new QuestaoResp;
        $item->avaliacao_id = $_POST['id_avaliacao'];
        $item->respostas_id  = 0;
        $item->questao_id = $_POST['id_pergunata'];
        $item->escrita = $_POST['escrita'];
        $item->status = 1;
        $item->cadastar();
    }

    header('location: avaliacao-list.php?');
    exit;
}
