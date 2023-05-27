<?php

namespace App\Http\Controllers;

class SelectionSortController
{
    function selectionSort($array)
    {
        $length = count($array);

        for ($i = 0; $i < $length - 1; $i++) {
            $minIndex = $i;

            for ($j = $i + 1; $j < $length; $j++) {
                echo "Comparing $array[$j] with $array[$minIndex]<br>";
                if ($array[$j] < $array[$minIndex]) {
                    echo "$array[$j] is smaller than $array[$minIndex]. Updating minIndex to $j<br>";
                    $minIndex = $j;
                }
            }

            if ($minIndex !== $i) {
                echo "Swapping $array[$i] with $array[$minIndex]<br>";
                // Swap values
                $temp = $array[$i];
                $array[$i] = $array[$minIndex];
                $array[$minIndex] = $temp;
            }
            echo "Iteration $i: ";
            print_r($array);
            echo "<br>";
        }

        return $array;
    }

    public function testSelectionSort()
    {
        // Example usage of selection sort
        $array = [64, 25, 25, 1, 12, 22, 11, 65];
        $sortedArray = $this->selectionSort($array);
        $number = 25;

        // Create an instance of BinarySearchController
        $binarySearchController = new BinarySearchController();

        // Call the binarySearch method on the instance of BinarySearchController
        $index = $binarySearchController->binarySearch($sortedArray, $number);

        return view('selection-sort', ['sortedArray' => $sortedArray, 'index' => $index]);
    }
}
