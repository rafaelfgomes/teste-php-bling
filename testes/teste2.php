<!-- 
    Criar um algoritmo que leia um vetor de números e reordene este vetor contendo no início os números pares de forma crescente e depois, os ímpares de forma decrescente.
 -->

<?php

$arraySize = 6;
$flagStop = false;
$numbers = $evens = $odds = $orderedEvens = [];
$indexOdds = $indexEvens = $count = $varAux = 0;

//gerando uma array randômica

do {

    $randNumber = rand(1, 100);

    if ($count > 0 && ($randNumber === $numbers[$count - 1])) {
        $randNumber = rand(1, 100);
        continue;
    }

    $numbers[$count] = $randNumber;
    $count++;

    if ($count === $arraySize) {
        $flagStop = true;
    }

} while (!$flagStop);

echo "Array gerada: [ ";

foreach ($numbers as $key => $value) {
    echo $value . ((($key + 1) < $arraySize) ? ', ' : '');
}

echo " ]\n\n";

for ($i = 0; $i < $arraySize; $i++) { 
    if ( (($numbers[$i] % 2) === 0) && ($numbers[$i] > 1) ) {
        
        $evens[$indexEvens] = $numbers[$i];

        $indexEvens++;

        continue;
    }

    $odds[$indexOdds] = $numbers[$i];
    $indexOdds++;
}

//Ordenando os pares em ordem crescente
foreach ($evens as $key => $even) {
    for ($i = 0; $i < (count($evens) - 1); $i++) { 
        if ($evens[$i + 1] <= $evens[$i]) {
            $varAux = $evens[$i];
            $evens[$i] = $evens[$i + 1];
            $evens[$i + 1] = $varAux;
        }
    }
}

//Ordenando os ímpares em ordem decrescente
foreach ($odds as $key => $odd) {
    for ($i = 0; $i < (count($odds) - 1); $i++) { 
        if ($odds[$i + 1] >= $odds[$i]) {
            $varAux = $odds[$i];
            $odds[$i] = $odds[$i + 1];
            $odds[$i + 1] = $varAux;
        }
    }
}

echo "Array pares: [ ";

foreach ($evens as $key => $even) {
    echo $even . ((($key + 1) < $indexEvens) ? ', ' : '');
}

echo " ]\n\n";

echo "Array ímpares: [ ";

foreach ($odds as $key => $odd) {
    echo $odd . ((($key + 1) < $indexOdds) ? ', ' : '');
}

echo " ]\n\n";

$idxEvens = 0;
$idxOdds = 0;

for ($i = 0; $i < $arraySize; $i++) {

    if ($indexEvens > $i) {
        $numbers[$i] = $evens[$idxEvens];

        $idxEvens++;
        continue;
    }

    $numbers[$i] = $odds[$idxOdds];
    $idxOdds++;
}

echo "Nova array: [ ";

foreach ($numbers as $key => $value) {
    echo $value . ((($key + 1) < $arraySize) ? ', ' : '');
}

echo " ]\n\n";