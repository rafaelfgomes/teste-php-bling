<!-- 
    Criar um algoritmo que teste se dois retângulos se sobrepõem em um plano cartesiano e calcule a área do retângulo criado pela sobreposição. Deve receber como entrada dois retângulos formados por pontos, ex: (0,0),(2,2),(2,0),(0,2),(1,0),(1,2),(6,0),(6,2) e gerar uma saída informando a área calculada ou zero se não ocorrer sobreposição.
 -->

<?php

$rectangles = [];
$pointLetters = [ 'A', 'B', 'C', 'D' ];
$area = 0;

foreach (range(0, 1) as $rect) {

    $points = [];
    $cont = 0;

    foreach (range(0, 3) as $value) {
        echo 'Ponto ' . $pointLetters[$value] . ' [x]: ';
        $point1 = trim(fgets(STDIN, 1024));
    
        echo 'Ponto ' . $pointLetters[$value] . ' [y]: ';
        $point2 = trim(fgets(STDIN, 1024));
    
        $points[$pointLetters[$value]] = [
            'x' => $point1,
            'y' => $point2
        ];
    }

    $rectangles[] = $points;

    echo 'Retângulo ' . $rect + 1 . "\n";
    echo 'Pontos: [ ';

    foreach ($points as $key => $point) {
        echo $key . ' -> ' . $point['x'] . ', ' . $point['y'] . ((($cont + 1) < 4) ? ' | ' : '');
        $cont++;
    }

    echo " ]\n\n";
}

foreach ($rectangles as $key => $rectangle) {

    if (($rectangle['A']['x'] === $rectangle['B']['x']) && ($rectangle['C']['x'] === $rectangle['D']['y'])) {

        echo 'Pontos do retângulo ' . ($key + 1) . ' não formam um retângulo no plano cartesiano' . "\n";
        echo 'Resultado: 0' . "\n\n";
        continue;
    }

    if (($rectangle['A']['x'] === $rectangle['D']['x']) && 
        ($rectangle['B']['x'] === $rectangle['C']['x']) &&
        ($rectangle['A']['y'] === $rectangle['C']['y']) &&
        ($rectangle['B']['y'] === $rectangle['D']['y'])) {

            $distance1 = sqrt( ( pow(($rectangle['C']['x'] - $rectangle['A']['x']), 2) ) + ( pow(($rectangle['C']['y'] - $rectangle['A']['y']), 2) ));

            $distance2 = sqrt( ( pow(($rectangle['B']['x'] - $rectangle['C']['x']), 2) ) + ( pow(($rectangle['B']['y'] - $rectangle['C']['y']), 2) ));
        
            $area = $distance1 * $distance2;
    
            echo 'Área do Retângulo ' . ($key + 1) . "\n";
            echo 'Resultado: ' . number_format($area, 2, ',', '.') . ' m²' . "\n\n";
            continue;

    }
    
    echo 'Pontos do retângulo ' . ($key + 1) . ' não formam um retângulo no plano cartesiano' . "\n";
    echo 'Resultado: 0' . "\n\n";
}
