<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-success">
               <div class="card-header">

               </div>
               <form id="form1" action="prova-insert.php" method="post">


               <div class="table-responsive">
                  
                  <table class="table table-bordered table-hover table-striped">
                     <?php

use App\Entidy\Resposta;

$resultado="";
$letra = "";
$contar = 0;
$contar2 = 0;
$id_pergunta = 0;

foreach ($perguntas as $item) {
   $contar += 1;
   $id_pergunta = $item->id;
   
   $result = Resposta::getList('*', 'respostas', 'questao_id=' . $item->id, null, null);
   
   echo '<thead>
                 <input type="hidden" name="id_avaliacao" value="'.$avaliacao_id.'">
                        <tr>
                           <td colspan="4" style="background-color:#ebfef4">
                              <h4><span style="text-transform: uppercase;">'.$contar. 'º) ' . $item->descricao . '</span></h4>
                           </td>
                        </tr>
                        <tr>
                           <th style="text-align: left; width:80px">SELECIONE </th>
                           <th> RESPOSTAS </th>
                          
                           
                        </tr> 
                     </thead>
                     <tbody>';
                     foreach ($result as $val) {
                        
                        switch ($val->tipo_id) {
                           case '1':
                              echo '<tr>
                              <td><div class="icheck-danger d-inline">
                              <input type="radio" id="'.$val->id.'" name="tipo['.$val->questao_id.']" value="'.$val->id.'">
                              <label for="'.$val->id.'">
                            
                              </label>
                              </div></td>
                              <td style="text-transform: uppercase; font-size:14px">'.$val->resp.'</td>
                              </tr></tbody>';
                              break;
                           case '2':
                              echo '<tr>
                              <td><div class="icheck-info ">
                              <input type="checkbox" value="' . $val->id . '" name="id[]" id="[' . $val->id . ']">
                              <label for="[' . $val->id . ']"></label>
                              </div></td>
                              <td style="text-transform: uppercase; font-size:14px">'.$val->resp.'</td>
                              </tr></tbody>';
                              break;
                           
                           default:
                           echo '<tr>
                              <input type="hidden" name="id_pergunata" value="'.$val->id.'">
                              <td style="text-transform: uppercase; font-size:14px"></td>
                              <td><textarea class="form-control" name="escrita" rows="4" style="width:600px" required></textarea></td>
                              </tr></tbody>';
                              break;
                        }
                     
                     }

                     
                     }

                     ?>
                  </table>

               </div>
               <div>
               <input type="submit" name="submit" value="Finalizar " class="btn btn-primary" >
               </div>
              </form>

            </div>

         </div>

      </div>

   </div>

</section>