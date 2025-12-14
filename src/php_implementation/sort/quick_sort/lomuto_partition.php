<?php

$start = microtime(true);

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

    $pivot = lomutoPartition($array, $left, $right);

    quickSort($array, $left, $pivot - 1);
    quickSort($array, $pivot + 1, $right);
}

function lomutoPartition(array &$array, int $left, int $right): int
{
    $pivot = $array[$right];
    $i = $left - 1;

    for ($j = $left; $j < $right; $j++) {
        if ($array[$j] <= $pivot) {
            $i++;
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
        }
    }

    $i++;
    $temp = $array[$i];
    $array[$i] = $array[$right];
    $array[$right] = $temp;

    return $i;
}

quickSort($array, 0, count($array) - 1);
print_r($array);

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";