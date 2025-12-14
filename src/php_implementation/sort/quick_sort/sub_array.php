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

function quickSort(array $array): array
{
    $length = count($array);
    if ($length <= 1) {
        return $array;
    }

    $less_than_pivot = [];
    $greater_than_pivot = [];
    $pivot = $array[array_rand($array)];

    for ($i = 1; $i < $length; $i++) {
        if ($array[$i] <= $pivot) {
            $less_than_pivot[] = $array[$i];
        } else {
            $greater_than_pivot[] = $array[$i];
        }
    }

    return [...quickSort($less_than_pivot), ...[$pivot], ...quickSort($greater_than_pivot)];
}

print_r(quickSort($array));

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";