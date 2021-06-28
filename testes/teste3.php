<!--
    Escreva um algoritmo que calcule o tempo em dias a partir de uma data inicial e final recebidos no formato dd/mm/aaaa. Não deve usar funções de data e hora.
-->

<?php

$initYear = 1900;
$finalYear = 2100;
$totalDays = 0;
$count = 0;

//                    J   F   M   A   M   J   J   A   S   O   N   D
$daysOfEveryMonth = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

$leapYears = [];
$rangeYears = [];

foreach (range($initYear, $finalYear) as $key => $year) {
    $rangeYears[$key] = $year;
}

foreach ($rangeYears as $key => $year) {
    if ( ( ($year % 400) === 0 ) || ( (($year % 4) === 0) && (($year % 100) != 0) ) ) {
        $leapYears[$key] = $year;
    }
}

$leapYears = array_values($leapYears);

echo "Digite a data inicial (dd/mm/yyyy): ";
$readInitialDate = trim(fgets(STDIN, 1024));

echo "Digite a data final (dd/mm/yyyy): ";
$readFinalDate = trim(fgets(STDIN, 1024));

$initialDate = explode('/', $readInitialDate);
$finalDate = explode('/', $readFinalDate);

if (($initialDate[2] === $finalDate[2]) && ($initialDate[1] === $finalDate[1]) && ($initialDate[0] === $finalDate[0])) {
    die("Data inicial e final são iguais\n\n");
}

if (($initialDate[2] > $finalDate[2])) {
    die("Ano inicial não pode ser maior que ano final\n\n");
}

if (($initialDate[2] === $finalDate[2]) && ($initialDate[1] > $finalDate[1])) {
    die("Mês final não pode ser menor que mês inicial\n\n");
}

if (($initialDate[2] === $finalDate[2]) && ($initialDate[1] === $finalDate[1]) && ($initialDate[0] > $finalDate[0])) {
    die("Data inicial não pode ser maior que data final\n\n");
}

//Ano inicial e final iguais
if ($initialDate[2] === $finalDate[2]) {

    //Mês inicial e final iguais
    if ($initialDate[1] === $finalDate[1]) {
        $totalDays = $finalDate[0] - $initialDate[0];
        echo 'Total de dias: ' . $totalDays . " dia(s)\n\n";
        return;
    }

    //Cálculo dos dias com meses diferentes
    foreach (range($initialDate[1], $finalDate[1]) as $key => $month) {
        foreach ($daysOfEveryMonth as $key => $day) {
            if ($month === ($key + 1)) {
                $totalDays += $day;
            }

            if (intval($initialDate[1]) === ($key + 1)) {
                $diffDaysInitial = ($initialDate[0] > 1) ? ($day + 1) - $initialDate[0] : 0;
            }

            if (intval($finalDate[1]) === ($key + 1)) {
                $diffDaysFinal = ($finalDate[0] > 1) ? ($day + 1) - $finalDate[0] : 0;
            }
        }

        foreach ($leapYears as $key => $leapYear) {
            if (intval($initialDate[2]) === $leapYear) {
                if ($month === 2) {
                    $totalDays += 1;
                }
            }
        }
    }

    $totalDays -= ($diffDaysInitial + $diffDaysFinal);

    echo 'Total de dias: ' . $totalDays . " dia(s)\n\n";
    return; 
}

$yearsPassed = (intval($initialDate[1]) > intval($finalDate[1])) ? 0 : $finalDate[2] - $initialDate[2];

if ($yearsPassed === 0) {

    foreach (range($initialDate[1], 12) as $key => $month) {
            
        foreach ($daysOfEveryMonth as $key => $day) {
            if ($month === ($key + 1)) {
                $totalDays += $day;
            }

            if (intval($initialDate[1]) === ($key + 1)) {
                $diffDaysInitial = ($initialDate[0] > 1) ? ($day + 1) - $initialDate[0] : 0;
            }

            if (intval($finalDate[1]) === ($key + 1)) {
                $diffDaysFinal = ($finalDate[0] > 1) ? ($day + 1) - $finalDate[0] : 0;
            }
        }

        foreach ($leapYears as $key => $leapYear) {
            if (intval($initialDate[2]) === $leapYear) {
                if ($month === 2) {
                    $totalDays += 1;
                }
            }
        }
    }

    $totalDays -= ($diffDaysInitial + $diffDaysFinal);

    echo 'Total de dias: ' . $totalDays . " dia(s)\n\n";
    return;
}

foreach (range($initialDate[2], $finalDate[2]) as $key => $year) {

    if (intval($initialDate[2]) === $year) {

        foreach (range($initialDate[1], 12) as $key => $month) {

            foreach ($daysOfEveryMonth as $key => $day) {
                if ($month === ($key + 1)) {
                    $totalDays += $day;
                }
    
                if (intval($initialDate[1]) === ($key + 1)) {
                    $diffDaysInitial = ($initialDate[0] === 1) ? 0 : ($initialDate[0] - 1);
                }
            }
    
            foreach ($leapYears as $key => $leapYear) {
                if (intval($initialDate[2]) === $leapYear) {
                    if ($month === 2) {
                        $totalDays += 1;
                    }
                }
            }
        }

    } else if (intval($finalDate[2]) === $year) {

        foreach (range(1, $finalDate[1]) as $key => $month) {
            
            foreach ($daysOfEveryMonth as $key => $day) {
                if ($month === ($key + 1)) {
                    $totalDays += $day;
                }
    
                if (intval($finalDate[1]) === ($key + 1)) {
                    $diffDaysFinal = ($day + 1) - $finalDate[0];
                }
            }
    
            foreach ($leapYears as $key => $leapYear) {
                if (intval($finalDate[2]) === $leapYear) {
                    if ($month === 2) {
                        $totalDays += 1;
                    }
                }
            }
        }

    } else {
        foreach (range(1, 12) as $key => $month) {

            foreach ($daysOfEveryMonth as $key => $day) {
                if ($month === ($key + 1)) {
                    $totalDays += $day;
                }
            }
    
            foreach ($leapYears as $key => $leapYear) {
                if (intval($initialDate[2]) === $leapYear) {
                    if ($month === 2) {
                        $totalDays += 1;
                    }
                }
            }
        }
    }
}

echo 'diasTotal: ' . $totalDays . "\n";
echo 'diasInicial: ' . $diffDaysInitial . "\n";
echo 'diasFinal: ' . $diffDaysFinal . "\n";

$totalDays -= ($diffDaysInitial + $diffDaysFinal);
echo 'Total de dias: ' . $totalDays . " dia(s)\n\n";
