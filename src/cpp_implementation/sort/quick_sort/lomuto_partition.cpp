#include <iostream>
#include <chrono>

using namespace std;
using namespace std::chrono;

void quickSort(int array[], int left, int right);
int lomutoPartition(int array[], int left, int right);

int main() {
    int array[100000];
    int n;
    cin >> n;
    srand(time(NULL));

    for (int i = 0; i < n; i++) {
        array[i] = rand() % 100000000;
    }

    auto start = high_resolution_clock::now();

    quickSort(array, 0, n - 1);
    for (int i = 0; i < n; i++) {
        cout << array[i] << "\n";
    }

    auto end = high_resolution_clock::now();
    auto duration = duration_cast<milliseconds>(end - start);

    cout << "Time: " << duration.count() << " ms" << endl;
}

void quickSort(int array[], int left, int right) {
    if (left >= right) {
        return;
    }

    int pivot = lomutoPartition(array, left, right);
    quickSort(array, left, pivot - 1);
    quickSort(array, pivot + 1, right);
}

int lomutoPartition(int array[], int left, int right) {
    int pivot = array[right];
    int i = left - 1;

    for (int j = left; j < right; j++) {
        if (array[j] <= pivot) {
            i++;
            swap(array[i], array[j]);
        }
    }

    // Swap pivot
    i++;
    swap(array[i], array[right]);

    return i; // return pivot position
}