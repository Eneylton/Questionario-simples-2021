<?php

use App\Entidy\Resposta;

$resultados = '';
$colunas = '';
$contador = 0;

foreach ($questao_list as $item) {

   $respostas_list = Resposta::getList('count(qr.respostas_id) as total,
   r.resp as respostas', 'questao_respostas AS qr
   INNER JOIN
respostas AS r ON (r.id = qr.respostas_id)', 'questao_id=' . $item->id.' group by r.resp');

   $contador += 1;

   $colunas .= '<div class="col-lg-6">
   <div class="card">
      <div class="card-header border-0">
         <div class="d-flex justify-content-between">
            <h5>'.$contador.'ª) '.$item->descricao.'</h5>

            
         </div>

         
         <table class="table">
         <thead>
            <tr>
               <th>RESPOSTAS</th>
               <th>SALDO</th>
            </tr>
         </thead>
         <tbody>';
         
         $cor = 0; 

         foreach ($respostas_list as $item2) {

            if($item2->total >= 1 && $item2->total <= 4 ){

               $cor = "bg-red";

            }elseif($item2->total >= 5 && $item2->total <= 7 ){

               $cor = "bg-blue";

            }elseif($item2->total >= 8 && $item2->total <= 10 ){

               $cor = "bg-green";
            }

            $colunas .= '<tr>
            <td>' . $item2->respostas . '</td>
            <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar '.$cor.'" role="progressbar" aria-valuenow="'.$item2->total.'0" aria-valuemin="0" aria-valuemax="100" style="width: '.$item2->total.'0%">
                              </div>
                          </div>
                          <small>
                          '.$item2->total.'0% Total votos
                          </small>
                      </td>
            </tr>';
        }
            
        $colunas .=' </tbody>
      </table>
      </div>

   </div>

</div>';

}

?>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <?= $colunas ?>
      </div>
   </div>

</section>