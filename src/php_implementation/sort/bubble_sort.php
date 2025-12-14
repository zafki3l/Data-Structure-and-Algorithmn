<?php

$start = microtime(true);

$array = [];
$array = randomArrayGenerator($array, 5);

function randomArrayGenerator(array $array, int $number) {
    for ($i = 0; $i < $number; $i++) {
        $array[] = rand(-100, 100);
    }

    return $array;
}

function bubbleSort(array &$array): void
{
    $length = count($array);

    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
}

bubbleSort($array);
print_r($array);

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";