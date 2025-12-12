<?php

// run code: php recursive_binary_search.php

function main(): void
{
    $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $target = 5;

    echo recursiveBinarySearch($array, $target) == true ? 'Found' : 'Not found';
}

function recursiveBinarySearch($array, $target): bool
{
    if (count($array) == 0) {
        return false;
    }

    $mid = (int) ((count($array)) / 2);

    if ($array[$mid] == $target) {
        return true;
    }

    $nextArray = sliceArray($array, $mid, $target);
    
    return recursiveBinarySearch($nextArray, $target);
}

function sliceArray($array, $mid, $target): array
{
    return ($array[$mid] < $target) 
        ? array_slice($array, $mid + 1) 
        : array_slice($array, 0, $mid);
}

main();
