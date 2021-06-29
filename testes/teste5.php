<!-- 
    Um algoritmo deve buscar um sub-texto dentro de um texto fornecido. (Não usar funções de busca em string).
 -->

<?php

$text = 'The quick brown fox jumps over the lazy dog';
$found = $partial = false;
$searchText = '';
$count = 0; 
$explodedText = $explodedSearch = $check = [];

echo 'Texto: ' . $text . "\n\n";

echo 'Digite o texto que deseja procurar: ';
$searchText = trim(fgets(STDIN, 1024));

$explodedText = explode(' ', $text);

if (preg_match('/^\S.*\s.*\S$/', $searchText)) {
    $explodedSearch = explode(' ', $searchText);
}

if (!empty($explodedSearch)) {
    foreach ($explodedSearch as $key => $searchWord) {
        foreach ($explodedText as $word) {
            if ($searchWord === $word) {
                $found = true;
                $count++;
            }
        }

        if ($count < ($key + 1)) {
            $partial = true;
        }
    }

    if ($found && !$partial) {
        echo 'Busca por \'' . $searchText . '\' encontrou o texto na frase: ' . $text . "\n\n";
    } elseif ($found && $partial) {
        echo 'Busca por \'' . $searchText . '\' econtrou parcialmente o texto na frase: ' . $text . "\n\n";
    } else {
        echo 'Texto \'' . $searchText . '\' não encontrado' . "\n\n";
    }

} else {

    foreach ($explodedText as $key => $word) {
            
        if ($searchText === $word) {
            $found = true;
        }

    }

    if ($found) {
        echo 'Texto \'' . $searchText . '\' encontrado na frase: ' . $text . "\n\n";
    } else {
        echo 'Texto \'' . $searchText . '\' não encontrado' . "\n\n";
    } 
}
