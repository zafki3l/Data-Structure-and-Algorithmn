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

function quickSort(array $array): array
{
    return [];
}

print_r(quickSort($array));

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";