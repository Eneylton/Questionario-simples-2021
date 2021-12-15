<?php
require __DIR__ . '../../../vendor/autoload.php';

use  \App\Db\Pagination;
use   \App\Entidy\Avaliacao;
use    \App\Session\Login;

define('TITLE','Avaliação');
define('BRAND','Avaliação');


Login::requireLogin();


$buscar = filter_input(INPUT_GET, 'buscar', FILTER_SANITIZE_STRING);

$condicoes = [
    strlen($buscar) ? 'id LIKE "%'.str_replace(' ','%',$buscar).'%" or 
                       descricao LIKE "%'.str_replace(' ','%',$buscar).'%"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$qtd = Avaliacao:: getQtd($where);

$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 50);

$listar = Avaliacao::getList('*','avaliacao',$where, 'id desc',$pagination->getLimit());

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/avaliacao/avaliacao-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>

<script>
$(document).ready(function(){
    $('.editbtn').on('click', function(){
        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#titulo').val(data[1]);
       
    });
});
</script>
