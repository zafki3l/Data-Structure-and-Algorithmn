var array = [1, 2, 3, 4, 5];
var target = 5;

function recursiveBinarySearch(array, target, first, last) {
    if (first > last) {
        return -1;
    }

    let mid = parseInt((first + last) / 2);

    if (array[mid] === target) {
        return mid;
    }

    return (array[mid] < target) 
        ? recursiveBinarySearch(array, target, mid + 1, last)
        : recursiveBinarySearch(array, first, mid - 1);
}

console.log(recursiveBinarySearch(array, target, 0, array.length - 1));