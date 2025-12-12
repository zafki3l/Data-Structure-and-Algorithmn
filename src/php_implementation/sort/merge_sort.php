<?php

$array = [];
$array = randomArrayGenerator($array, 100);

function randomArrayGenerator(array $array, int $number) {
    for ($i = 0; $i < $number; $i++) {
        $array[] = rand(-100, 100);
    }

    return $array;
}

function mergeSort(array $array)
{
    $length = count($array);

    if ($length <= 1) {
        return $array;
    }

    $left_array = [];
    $right_array = [];
}

function slice(array $array, int $start, int $end)
{

}