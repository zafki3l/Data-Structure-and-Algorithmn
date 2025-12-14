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

function insertionSort(array $array): array
{
    $length = count($array);
    for ($i = 0; $i < $length; $i++) {
        $j = $i;

        while ($j > 0 && $array[$j - 1] > $array[$j]) {
            $temp = $array[$j];
            $array[$j] = $array[$j - 1];
            $array[$j - 1] = $temp;
            $j--;
        }
    }

    return $array;
}

print_r($array);
print_r(insertionSort($array));

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";