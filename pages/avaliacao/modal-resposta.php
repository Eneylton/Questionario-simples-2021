<?php

require __DIR__ . '../../../vendor/autoload.php';

use App\Entidy\Resposta;

$dados = "";
$contador = 0;

$id = filter_input(INPUT_GET, "id_cat", FILTER_SANITIZE_NUMBER_INT);

$liistarRespostas = Resposta::getQuestaoAll('r.id as id,r.resp as respostas', 'respostas AS r
INNER JOIN
questao AS q ON (r.questao_id = q.id)',$id, null, null);

$dados .= "<table class='table'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>";

foreach ($liistarRespostas as $item) {

    $contador += 1;

    $dados .= "<tr>
                            <td style='font-size:22px'>$contador</td>
                            <td style='font-size:22px'>$item->respostas</td>
                          
                        </tr>";
    
}

$dados .= "</tbody>
                </table>";

                $retorna = ['erro' => false, 'dados' => $dados];

                echo json_encode($retorna);

?>