<!-- 
    Receba 6 números representando medidas a,b,c,d,e e f e relacionar quantos e quais triângulos é possível formar usando estas medidas. Exemplo [abc], [abd]
 -->

<?php

$measures = [];
$combinations = [];
$count = 0;

foreach (range(1, 6) as $key => $value) {
    echo 'Digite o ' . $value . 'º número: ';
    $measures[$key] = trim(fgets(STDIN, 1024));
}

for($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 6; $j++) {
        if ($i != $j) {
            for ($k = 0; $k < 6; $k++) {
                if ($j != $k && $i != $k) {

                    if (($measures[$i] > $measures[$j]) && ($measures[$i] > $measures[$k])) {
                        if (($measures[$j] + $measures[$k]) > $measures[$i]) {
                            $combinations[$count] = [
                                'measures' => $measures[$i] . ' cm | ' .  $measures[$j] . ' cm | ' . $measures[$k] . ' cm',
                                'combination' => setLetter($i) . setLetter($j) . setLetter($k)
                            ];
                        }
                    } elseif (($measures[$j] > $measures[$i]) && ($measures[$j] > $measures[$k])) {
                        if (($measures[$i] + $measures[$k]) > $measures[$j]) {
                            $combinations[$count] = [
                                'measures' => $measures[$i] . ' cm | ' .  $measures[$j] . ' cm | ' . $measures[$k] . ' cm',
                                'combination' => setLetter($i) . setLetter($j) . setLetter($k)
                            ];
                        }
                    } else {
                        if (($measures[$i] + $measures[$j]) > $measures[$k]) {
                            $combinations[$count] = [
                                'measures' => $measures[$i] . ' cm | ' .  $measures[$j] . ' cm | ' . $measures[$k] . ' cm',
                                'combination' => setLetter($i) . setLetter($j) . setLetter($k)
                            ];
                        }
                    }

                    $count++;                    
                }  
            }
        }
    }
}

foreach ($combinations as $key => $combination) {
    echo 'Medidas-> ' . $combination['measures'] . ' | Combinação-> [' . $combination['combination'] . ']' . "\n";
}

function setLetter($number)
{
    switch ($number) {
        case 0:
            return 'a';
        case 1:
            return 'b';
        case 2:
            return 'c';
        case 3:
            return 'd';
        case 4:
            return 'e';
        case 5:
            return 'f';
        default:
            break;
    }
}