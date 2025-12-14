<?php

$start = microtime(true);

$array = [];
$array = randomArrayGenerator($array, 100_000);

function randomArrayGenerator(array $array, int $number) {
    for ($i = 0; $i < $number; $i++) {
        $array[] = rand(-100_000, 100_000);
    }

    return $array;
}

function stalinSort(array $array) {
    $length = count($array);

    $sorted = [$array[0]];
    for ($i = 1; $i < $length; $i++) {
        if ($array[$i] >= $sorted[count($sorted) - 1]) {
            $sorted[] = $array[$i];
        } else {
            echo "Stalin remove {$array[$i]}\n";
        }
    }

    return $sorted;
}

print_r($array);
print_r(stalinSort($array));

$end = microtime(true);
echo "Time: " . ($end - $start) . "s\n";