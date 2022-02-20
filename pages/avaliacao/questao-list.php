<?php
require __DIR__ . '../../../vendor/autoload.php';

use  \App\Db\Pagination;
use   \App\Entidy\Avaliacao;
use App\Entidy\Tipo;
use    \App\Session\Login;

$avaliacao ="";

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Avaliacao:: getID('*','avaliacao',$_GET['id'],null,null);

$avaliacao = $value->titulo;
$id_avaliacao = $value->id;

define('TITLE',$avaliacao);
define('BRAND','Avaliação');

Login::requireLogin();


$buscar = filter_input(INPUT_GET, 'buscar', FILTER_UNSAFE_RAW);

$condicoes = [
    strlen($buscar) ? 'id LIKE "%'.str_replace(' ','%',$buscar).'%" or 
    descricao LIKE "%'.str_replace(' ','%',$buscar).'%"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$qtd = Avaliacao:: getQtd($where);

$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 50);

$listar = Avaliacao::getList('*','questao','avaliacao_id='.$id_avaliacao, 'id ASC',$pagination->getLimit());

$tipos = Tipo :: getList('*','tipo',null,'id DESC');

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/avaliacao/questao-form-list.php';
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
        $('#nivel').val(data[1]);
       
    });
});
</script>
<script>
$(document).ready(function(){
    $('.editbtn2').on('click', function(){
        $('#editmodal2').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        $('#id2').val(data[0]);
        $('#descricao').val(data[1]);
       
    });
});
</script>

<script>

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-6"><input class="form-control" type="text" name="opcao['+x+']"/></div><div class="col-6"><a href="#" class="remove_field"><span style="color:#ff0000"><i class="fa fa-times" aria-hidden="true"></i> &nbsp; Remover</span></a></div><p></p>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});


</script>
