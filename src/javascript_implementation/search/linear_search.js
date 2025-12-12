const array = [1, 2, 3, 4, 5];
var target = 5;

function linearSearch(array, target) {
    for (var i = 0; i < array.length; i++) {
        if (array[i] === target) {
            return i;
        }
    }
    return -1;
}

console.log(linearSearch(array, target));