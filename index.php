<?php

require __DIR__ . '/vendor/autoload.php';

use   \App\Session\Login;

define('TITLE', 'Painel de controle');
define('BRAND', 'Painel de controle ');

Login::requireLogin();


include __DIR__ . '/includes/dashboard/header.php';
include __DIR__ . '/includes/dashboard/top.php';
include __DIR__ . '/includes/dashboard/menu.php';
include __DIR__ . '/includes/dashboard/content.php';
include __DIR__ . '/includes/dashboard/box-infor.php';
include __DIR__ . '/includes/dashboard/footer.php';

?>

<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [

                <?php

                foreach ($grafico as $item) {

                    echo "'" . $item->mes . "',";
                }

                ?>
            ],
            datasets: [{
                label: '¨ TOTAL POR MÊS ¨ ',
                data: [
                <?php
                
                foreach ($grafico as $item) {
    
                    echo "'".$item->total."',";
                }
            
            
             
            ?>
            ],
                backgroundColor: [
                    '#eb2525ad',
                    '#c0eb25ad',
                    '#29af13ad',
                    '#23e9acad',
                    '#8833aac2',
                    '#ffb953',
                    '#0084ff',
                    '#00ff3b',
                    '#fffb00',
                    '#ff005a',
                    '#a100ff',
                    '#00e3ff'
                ],
                borderColor: [
                    '#eb2525ad',
                    '#c0eb25ad',
                    '#29af13ad',
                    '#23e9acad',
                    '#8833aac2',
                    '#ffb953',
                    '#0084ff',
                    '#00ff3b',
                    '#fffb00',
                    '#ff005a',
                    '#a100ff',
                    '#00e3ff'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script type="text/javascript">
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [

                <?php

                foreach ($grafico as $item) {

                    echo "'" . $item->mes . "',";
                }

                ?>
            ],
            datasets: [{
                label: '¨ TOTAL POR MÊS ¨ ',
                data: [
                <?php
                
                foreach ($grafico as $item) {
    
                    echo "'".$item->total."',";
                }
            
            
             
            ?>
            ],
                backgroundColor: [
                    '#eb2525ad',
                    '#c0eb25ad',
                    '#29af13ad',
                    '#23e9acad',
                    '#8833aac2',
                    '#ffb953',
                    '#0084ff',
                    '#00ff3b',
                    '#fffb00',
                    '#ff005a',
                    '#a100ff',
                    '#00e3ff'
                ],
                borderColor: [
                    '#eb2525ad',
                    '#c0eb25ad',
                    '#29af13ad',
                    '#23e9acad',
                    '#8833aac2',
                    '#ffb953',
                    '#0084ff',
                    '#00ff3b',
                    '#fffb00',
                    '#ff005a',
                    '#a100ff',
                    '#00e3ff'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

