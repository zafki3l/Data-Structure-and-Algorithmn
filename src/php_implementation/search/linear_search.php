<?php

function main(): void
{
    $array = [1, 2, 3, 3, 5, 6, 7, 8, 9, 10];

    $found = linearSearch($array, 3);

    echo !empty($found) ? "Found at index: " . implode(', ', $found) : 'Cannot found';
}

function linearSearch($array, $target): array
{
    $foundAt = [];
    
    $sizeOfArray = count($array);
    for ($i = 0; $i < $sizeOfArray; $i++) {
        if ($array[$i] == $target) {
            $foundAt[] = $i;
        }
    }

    return $foundAt;
}

main();