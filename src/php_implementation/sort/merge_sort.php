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

function mergeSort(array $array)
{
    $length = count($array);

    if ($length <= 1) {
        return $array;
    }

    $mid = (int) ($length / 2);

    $left_array = slice($array, 0, $mid);
    $right_array = slice($array, $mid, $length);

    $left = mergeSort($left_array);
    $right = mergeSort($right_array);

    return merge($left, $right);
}

function slice(array $array, int $start, int $end): array
{
    $slicedArray = [];

    for ($i = $start; $i < $end; $i++) {
        $slicedArray[] = $array[$i];
    }

    return $slicedArray;
}

function merge(array $left, array $right): array
{
    $mergedArray = [];
    $i = 0;
    $j = 0;
    
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] > $right[$j]) {
            $mergedArray[] = $right[$j];
            $j++;
        } else {
            $mergedArray[] = $left[$i];
            $i++;
        }
    }

    while ($i < count($left)) {
        $mergedArray[] = $left[$i];
        $i++;
    }

    while ($j < count($right)) {
        $mergedArray[] = $right[$j];
        $j++;
    }

    return $mergedArray;
}

print_r(mergeSort($array));

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";