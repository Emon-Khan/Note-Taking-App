public class ArraySorting {
    public static void main(String[] args) {
        int nums[] = { 2, 7, 5, 6 };
        int target = 5;
        int[] arr = sort(nums, 0, nums.length - 1);
        // for (int temp : arr) {
        //     System.out.println(temp);
        // }
        int index = findIndex(arr, target);
        System.out.println(index);
    }

    public static int[] sort(int[] nums, int s, int e) {
        if (s < e) {
            int m = s + (e - s) / 2;
            sort(nums, s, m);
            sort(nums, m + 1, e);
            merge(nums, s, m, e);
        }
        return nums;
    }

    public static int[] merge(int[] nums, int s, int m, int e) {
        int sizeOfFirstArr = m - s + 1;
        int sizeOfSecondArr = e - m;

        int[] firstArr = new int[sizeOfFirstArr];
        int[] secondArr = new int[sizeOfSecondArr];

        for (int i = 0; i < sizeOfFirstArr; i++) {
            firstArr[i] = nums[s + i];
        }
        for (int i = 0; i < sizeOfSecondArr; i++) {
            secondArr[i] = nums[m + i + 1];
        }
        int i = 0, j = 0, k = s;
        while (i < sizeOfFirstArr && j < sizeOfSecondArr) {
            if (firstArr[i] < secondArr[j]) {
                nums[k] = firstArr[i];
                i++;
            } else {
                nums[k] = secondArr[j];
                j++;
            }
            k++;
        }
        while (i < sizeOfFirstArr) {
            nums[k] = firstArr[i];
            i++;
            k++;
        }
        while (j < sizeOfSecondArr) {
            nums[k] = secondArr[j];
            j++;
            k++;
        }
        return nums;
    }

    public static int findIndex(int[] arr, int target) {
        int index = 0, flag = 0;
        int length = arr.length;
        for (int i = 0; i < length - 1; i++) {
            if (arr[i] < target && arr[i + 1] > target) {
                index = i + 1;
                flag++;
                break;
            } else if (arr[i] == target) {
                index = i;
                flag++;
                break;
            }
        }
        if (arr[length - 1] < target && flag == 0) {
            index = length;
        }
        return index;
    }
}