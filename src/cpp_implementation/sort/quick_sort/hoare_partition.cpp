#include <iostream>
#include <chrono>
#include <random>

using namespace std;
using namespace std::chrono;

int hoarePartition(int array[], int left, int right) {
    int pivot = array[left];

    int i = left - 1;
    int j = right + 1;

    while (true) {
        do {
            i++;
        } while (array[i] < pivot);

        do {
            j--;
        } while (array[j] > pivot);

        if (i < j) {
            swap(array[i], array[j]);
        } else {
            return j;
        }
    }
}

void quickSort(int array[], int left, int right) {
    if (left >= right) {
        return;
    }

    int pivot = hoarePartition(array, left, right);
    quickSort(array, left, pivot);
    quickSort(array, pivot + 1, right);
}

int main() {
    int array[100000];
    int n;
    cin >> n;
    
    mt19937 rng(time(NULL)); // Mersenne Twister
    uniform_int_distribution<int> dist(-1000000, 1000000);

    for (int i = 0; i < n; i++) {
        array[i] = dist(rng);
    }

    auto start = high_resolution_clock::now();

    quickSort(array, 0, n - 1);
    cout << "SORTED";

    auto end = high_resolution_clock::now();
    auto duration = duration_cast<milliseconds>(end - start);

    cout << "Time: " << duration.count() << " ms" << endl;
    return 0;
}