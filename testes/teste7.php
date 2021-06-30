<!-- 
    Um algoritmo deve armazenar o mapa abaixo e listar os caminhos entre os pontos A e E.
    Imagem: https://drive.google.com/file/d/1I5cz0ymvpxJIF2mcN6ZsQOBrEvZsOlr2/view?usp=sharing
 -->

<?php

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);

$path = [];
$index = 0;
$graph = [
    'A' => [ 'edges' => [ 
                [ 'visited' => 0, 'node' => 'B' ],
                [ 'visited' => 0, 'node' => 'D' ]
        ] 
    ],
    'B' => [ 'edges' => [
                [ 'visited' => 0, 'node' => 'A' ],
                [ 'visited' => 0, 'node' => 'C' ],
                [ 'visited' => 0, 'node' => 'D' ],
                [ 'visited' => 0, 'node' => 'E' ]
        ]
    ],
    'C' => [ 'edges' => [ 
                [ 'visited' => 0, 'node' => 'B' ],
                [ 'visited' => 0, 'node' => 'E' ] 
        ] 
    ],
    'D' => [ 'edges' => [ 
                [ 'visited' => 0, 'node' => 'A' ],
                [ 'visited' => 0, 'node' => 'B' ],
                [ 'visited' => 0, 'node' => 'E' ],
                [ 'visited' => 0, 'node' => 'F' ]
        ]
    ],
    'E' => [ 'edges' => [ 
                [ 'visited' => 0, 'node' => 'B' ],
                [ 'visited' => 0, 'node' => 'C' ],
                [ 'visited' => 0, 'node' => 'D' ],
                [ 'visited' => 0, 'node' => 'F' ], 
                [ 'visited' => 0, 'node' => 'G' ] 
        ]
    ],
    'F' => [ 'edges' => [ 
                [ 'visited' => 0, 'node' => 'D' ],
                [ 'visited' => 0, 'node' => 'E' ],
                [ 'visited' => 0, 'node' => 'G' ]
        ]
    ],
    'G' => [ 'edges' => [ 
                [ 'visited' => 0, 'node' => 'E' ],
                [ 'visited' => 0, 'node' => 'F' ] 
        ] 
    ]
];

foreach ($graph as $keyGraph => $point) {

    foreach ($point['edges'] as $keyEdges => $edge) {

        if ($keyGraph === 'A') {

            $path[$index][] = 'A';

            if ($edge['node'] !== 'E') {

                $path[$index][] = $edge['node'];
                
                $next = nextLine($graph, $edge['node']);
    
                foreach ($next['edges'] as $keyNext => $ne) {
                    
                    if ($ne['node'] !== 'A' && $ne['node'] === 'E') {
                        
                        $path[$index][]= $ne['node'];
                        $index++;

                    }
                    
                }
    
            }
        } else {


        }

        $edge['visited'] = 1;

        //print_r($edge); die();

    }

    print_r($point); die();

}

print_r($graph);
//print_r($path);

function nextLine($arr, $index) {
    return $arr[$index];
}
