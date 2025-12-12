package src.java_implementation.search;

public class BinarySearch {
    public static void main(String[] args) {
        int[] array = {1, 2, 3, 4, 5, 6, 7};
        int target = 1;

        int foundIndex = binarySearch(array, target);
        System.out.println(foundIndex != -1 ? "Found at " + foundIndex : "Not Found");
    }

    public static int binarySearch(int[] array, int target) {
        int first = 0;
        int last = array.length - 1;

        while (first <= last) {
            int mid = (last + first) / 2;

            if (array[mid] == target) {
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
}
