<?php

$array = [];
$array = randomArrayGenerator($array, 100_000);

function randomArrayGenerator(array $array, int $number) {
    for ($i = 0; $i < $number; $i++) {
        $array[] = rand(-1_000_000, 1_000_000);
    }

    return $array;
}

function quickSort(array &$array, $left, $right): void
{
    if ($left >= $right) {
        return;
    }

    $pivot = hoarePartition($array, $left, $right);

    quickSort($array, $left, $pivot);
    quickSort($array, $pivot + 1, $right);
}

function hoarePartition(array &$array, int $left, int $right): int
{
    $pivot = $array[rand($left, $right)];
    
    $i = $left - 1;
    $j = $right + 1;

    while (true) {
        do {
            $i++;
        } while ($array[$i] < $pivot);

        do {
            $j--;
        } while ($array[$j] > $pivot);

        if ($i < $j) {
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
        } else {
            return $j;
        }
    }
}

$start = microtime(true);

quickSort($array, 0, count($array) - 1);
print_r($array);
echo "SORT\n";

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";