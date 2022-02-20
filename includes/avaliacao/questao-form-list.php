<?php

$list = '';


$resultados = '';

$contar = 0;

foreach ($listar as $item) {

   $contar += 1;

   $resultados .= '<tr>
                      <td style="display:none">' . $item->id . '</td>
                      <td style="display:none">' . $item->descricao . '</td>
                      <td><button type="submit" class="btn btn-success editbtn2" > <i class="fas fa-paint-brush"></i> </button>
                      &nbsp;
                      &nbsp;

                      <a href="questao-delete.php?id=' . $item->id . '">
                      <button type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                      </a>
                      </td>
                      <td>' . $contar . '</td>
                      <td>' . $item->descricao . '</td>
                    
                      <td style="text-align: center;">
                        
                  
                      <button class="btn btn-warning" onclick="listar(' . $item->id . ')" > <i class="fas fa-list"></i> &nbsp; Respostas</button>


                      </td>
                      </tr>

                      ';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                     <td colspan="6" class="text-center" > Nenhuma Questão Encontrada !!!!! </td>
                                                     </tr>';


unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);

//PAGINAÇÂO

$paginacao = '';
$paginas = $pagination->getPages();

foreach ($paginas as $key => $pagina) {
   $class = $pagina['atual'] ? 'btn-primary' : 'btn-secondary';
   $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '&' . $gets . '">

                  <button type="button" class="btn ' . $class . '">' . $pagina['pagina'] . '</button>
                  </a>';
}

?>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-purple">


               <div class="table-responsive">

                  <table class="table table-bordered table-dark table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                           <td colspan="4">
                              <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#modal-default"> <i class="fas fa-plus"></i> &nbsp; Nova Pergunta</button>
                           </td>
                        </tr>
                        <tr>
                           <th style="text-align: left; width:150px"> CÓDIGO </th>
                           <th> Nº </th>
                           <th> Questão </th>

                           <th style="text-align: center; width:400px"> AÇÃO </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?= $resultados ?>
                     </tbody>

                  </table>

               </div>


            </div>

         </div>

      </div>

   </div>

</section>

<?= $paginacao ?>


<div class="modal fade" id="modal-default">
   <div class="modal-dialog modal-lg">
      <div class="modal-content bg-light">
         <form action="./questao-insert.php" method="post">
            <input type="hidden" value="<?= $id_avaliacao ?>" name="id_avaliacao">
            <div class="modal-header">
               <h4 class="modal-title">Nova Pergunta
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label>Questão</label>
                  <input type="text" class="form-control" name="descricao" required>
               </div>
               <div class="form-group">

                     <label>Selecione o tipo </label>
                     <select class="form-control " style="width: 100%;" name="tipo_id" id="tipo_id">

                     <option value=""> Selecione um tipo </option>
                        <?php


                        foreach ($tipos as $item) {
                           echo '<option value="' . $item->id . '">' . $item->nome . '</option>';
                        }
                        ?>

                     </select>

                  </div>

               <div class="form-group input_fields_wrap">
             
                  <div class="col-6">
                     <button class="add_field_button btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Adicionar respostas</button><p></p>
                     <input type="text" class="form-control" name="opcao[]">
                  </div><p></p>
                  
               </div>

            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

         </form>

      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

<!-- EDITAR -->

<div class="modal fade" id="editmodal">
   <div class="modal-dialog modal-lg">
      <form action="./resposta-insert.php" method="get">
         <div class="modal-content bg-light">
            <div class="modal-header">
               <h4 class="modal-title">Incluir respostas
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="hidden" name="id" id="id">
               <input type="hidden" name="id_avaliacao" value="<?= $id_avaliacao ?>">

               <div class="row">
                  <div class="col-12">

                     <label>Selecione o tipo de avaliação</label>
                     <select class="form-control " style="width: 100%;" name="tipo_id" id="tipo_id" required>

                     <option value=""> Selecione um tipo </option>
                        <?php


                        foreach ($tipos as $item) {
                           echo '<option value="' . $item->id . '">' . $item->nome . '</option>';
                        }
                        ?>

                     </select>

                  </div>
               </div>

               <div class="row">

                  <div class="col-6">
                     <div class="form-group">
                        <label>Resposta 1</label>
                        <input type="text" class="form-control" name="resp1" >
                     </div>

                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <label>Resposta 2</label>
                        <input type="text" class="form-control" name="resp2">
                     </div>

                  </div>


               </div>
               <div class="row">
                  <div class="col-6">
                     <div class="form-group">
                        <label>Resposta 3</label>
                        <input type="text" class="form-control" name="resp3">
                     </div>


                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <label>Resposta 4</label>
                        <input type="text" class="form-control" name="resp4">
                     </div>


                  </div>
               </div>
               <div class="row">
                  <div class="col-6">
                     <div class="form-group">
                        <label>Resposta 5</label>
                        <input type="text" class="form-control" name="resp5">
                     </div>


                  </div>
                  <div class="col-6">

                     <div class="form-group">
                        <label>Resposta 6</label>
                        <input type="text" class="form-control" name="resp6">
                     </div>

                  </div>

               </div>


            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Salvar
               </button>
            </div>
         </div>
      </form>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="editmodal2">
   <div class="modal-dialog">
      <form action="./questao-edit.php" method="get">
         <div class="modal-content bg-light">
            <div class="modal-header">
               <h4 class="modal-title">Editar
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="hidden" name="id2" id="id2">
               <input type="hidden" name="id_avaliacao2" value="<?= $id_avaliacao ?>">
               <div class="form-group">
                  <label>Questão</label>
                  <input type="text" class="form-control" name="descricao" id="descricao" required>
               </div>

            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Atualizar
               </button>
            </div>
         </div>
      </form>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="listModal">
   <div class="modal-dialog">

      <div class="modal-content bg-light">
         <div class="modal-header">
            <h4 class="modal-title">RESPOSTAS
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
         <div class="col-12"> 
            <span style="text-align:left !important;">LISTA DE RESPOSTAS</span>
         </div>
            
            <div class="col-12"> 
               <span class="listar"></span>
            </div>

         </div>
         <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>

         </div>
      </div>

      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
