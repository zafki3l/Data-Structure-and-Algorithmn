package src.java_implementation.search;

public class LinearSearch {
    public static void main(String[] args) {
        int[] array = {1, 2, 3, 4, 5};
        int target = 5;

        System.out.println(linearSearch(array, target) != -1 ? "Found" : "Not found");
    }   

    public static int linearSearch(int array[], int target) {
        for (int i = 0; i < array.length; i++) {
            if (array[i] == target) {
                return i;
            }
        }

        return -1;
    }
}
