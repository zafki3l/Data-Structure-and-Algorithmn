<?php

$start = microtime(true);

$array = [];
$array = randomArrayGenerator($array, 12);

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
    $attemps = 0;
    while (!isSorted($array)) {
        $attemps++;
        shuffle($array);
        echo "{$attemps}\n";
    }

    return $array;
}

print_r(bogoSort($array));

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";