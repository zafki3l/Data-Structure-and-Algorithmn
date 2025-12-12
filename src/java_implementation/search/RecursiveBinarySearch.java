package src.java_implementation.search;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class RecursiveBinarySearch {
    public static void main(String[] args) {
        System.out.println("HELLO");

        List<Integer> array = new ArrayList<>(Arrays.asList(1, 2, 3, 4, 5));
        int target = 5;

        int foundIndex = recursiveBinarySearch(array, target, 0, array.size() - 1);

        System.out.println(foundIndex != -1 ? "Found at " + foundIndex : "Not found");
    }

    public static int recursiveBinarySearch(List<Integer> array, int target, int first, int last) {
        if (first > last) {
            return -1;
        }

        int mid = (first + last) / 2;

        if (array.get(mid) == target) {
            return mid;
        }

        return (array.get(mid) < target)
                ? recursiveBinarySearch(array, target, mid + 1, last)
                : recursiveBinarySearch(array, target, first, mid - 1);
    }
}
