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

function selectionSort(array $array): array
{
    $length = count($array);

    $attemps = 0;
    for ($i = 0; $i < $length - 1; $i++) {
        $min_index = $i;

        for ($j = $i + 1; $j < $length; $j++) {
            $attemps++;
            $min_index = ($array[$j] < $array[$min_index]) ? $j : $min_index;
        }

        [$array[$i], $array[$min_index]] = [$array[$min_index], $array[$i]];
    }

    return ['array' => $array, 'attemps' => $attemps];
}

print_r($array);
print_r(selectionSort($array));

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";