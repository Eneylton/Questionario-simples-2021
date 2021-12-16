<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-purple">
               <div class="card-header">

               </div>

               <div class="table-responsive">

                  <table class="table table-bordered table-hover table-striped">
                     <?php

                     use App\Entidy\Resposta;

                     $resultado="";
                     $letra = "";
                     $contar = 0;
                     $contar2 = 0;

                     foreach ($perguntas as $item) {
                        $contar += 1;

                              $result = Resposta::getList('*', 'respostas', 'questao_id=' . $item->id, null, null);

                        echo '<thead>
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

                      echo '<tr>
                      <td><div class="icheck-success d-inline">
                      <input type="radio" id="radioPrimary3" name="r1">
                      <label for="radioPrimary3">
                    
                      </label>
                    </div></td>
                      <td>'.$val->resp.'</td>
                      </tr></tbody>';
                     }
                     }

                     ?>
                  </table>

               </div>


            </div>

         </div>

      </div>

   </div>

</section>