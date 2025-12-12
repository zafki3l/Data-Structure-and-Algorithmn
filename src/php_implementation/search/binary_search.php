<?php

function main(): void
{
    $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    $found = binarySearch($array, 2);

    echo $found !== -1 ? "Found at index: {$found}" : 'Not Found';
}

function binarySearch($array, $target): int
{
    $first = 0;
    $last = count($array) - 1;

    while ($first <= $last) {
        $mid = (int) (($last + $first) / 2);

        if ($array[$mid] == $target) {
            return $mid;
        } 
        
        if ($target > $array[$mid]) {
            $first = $mid + 1;
        } else {
            $last = $mid - 1;
        }
    }

    return -1;
}

main();