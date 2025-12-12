const array = [1, 2, 3, 4, 5];
var target = 5;

function binarySearch(array, target) {
    let first = 0;
    let last = array.length - 1;

    while (first <= last) {
        let mid = parseInt((first + last) / 2);

        if (array[mid] === target) {
            return mid;
        }

        if (array[mid] < target) {
            first = mid + 1;
        } else {
            last = mid - 1;
        }
    }
    return -1;
}

console.log(binarySearch(array, target));