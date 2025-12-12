<?php

$array = [];
$array = randomArrayGenerator($array, 10);

function randomArrayGenerator(array $array, int $number) {
    for ($i = 0; $i < $number; $i++) {
        $array[] = rand(-100, 100);
    }

    return $array;
}

function isSorted(array $array): bool
{
    $length = count($array);
    for ($i = 0; $i < $length - 1; $i++) {
        if ($array[$i] > $array[$i + 1]) {
            return false;
        }
    }

    return true;
}

function bogoSort(array $array)
{
    while (!isSorted($array)) {
        shuffle($array);
    }

    return $array;
}

print_r(bogoSort($array));