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