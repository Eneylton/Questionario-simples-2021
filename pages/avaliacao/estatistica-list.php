<?php

require __DIR__ . '../../../vendor/autoload.php';

use App\Entidy\Questao;
use App\Session\Login;


define('TITLE', 'Estatística');
define('BRAND', 'Estítistica');


Login::requireLogin();

$resultados = '';

if (isset($_GET['id']) or is_numeric($_GET['id'])) {

    $questao_list = Questao::getList('*', 'questao', 'avaliacao_id=' . $_GET['id']);

}



include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/detalhe/detalhe-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';
