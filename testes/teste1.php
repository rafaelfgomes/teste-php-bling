<?php

$numbers = [];
$varAux = 0;
$startPosition = 0;

echo 'Digite o tamanho da array: ';
$arraySize = trim(fgets(STDIN, 1024));

echo 'Deseja mover quantas posições?: ';
$arrayShift = trim(fgets(STDIN, 1024));

if ($arrayShift > $arraySize) {
    echo 'Valor das posições deve ser menor que o tamanho do array\n\n';
    exit();
}

echo "Para qual lado?\n1. Direita\t2. Esquerda: ";
$arrayShiftSide = trim(fgets(STDIN, 1024));

if ($arrayShiftSide <= 0 && $arrayShiftSide > 2) {
    echo 'Valor do lado inválido\n\n';
    exit();
}

echo "\n";
echo "Criando o array...\n\n";

for ($i = 0; $i < $arraySize; $i++) { 
    echo 'Digite o ' . ($i + 1) . 'º elemento do array: ';
    $numbers[$i] = trim(fgets(STDIN, 1024));
}

echo "\nArray criada: [ ";

foreach ($numbers as $key => $value) {
    echo $value . ((($key + 1) < $arraySize) ? ', ' : '');
}

echo " ]\n\n";

$endRange = (intval($arrayShiftSide) === 2) ? ($arrayShift - 1) : (($arraySize - 1) - $arrayShift);

foreach (range(0, $endRange) as $key => $value) {
    $numbers[$arraySize + $key] = strval($numbers[$key]);
    unset($numbers[$key]);
}

//usando este helper apenas para resetar as posições do array e mostrar o resultado
$numbers = array_values($numbers);

echo 'Nova array: [ ';

foreach ($numbers as $key => $value) {
    echo $value . ((($key + 1) < $arraySize) ? ', ' : '');
}

echo " ]\n\n";
