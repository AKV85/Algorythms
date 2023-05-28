<?php

namespace App\Http\Controllers;

class BubbleSortController
{
    public function bubbleSort($array)
    {
        $length = count($array);
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $length - $i - 1; $j++) {
                // Display the numbers being compared
                echo "Comparing $array[$j] with {$array[$j + 1]}<br>";
                if ($array[$j + 1] < $array[$j]) {
                    echo "{$array[$j + 1]} is smaller than $array[$j]. Swapping...<br>";
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }

    public function testBubbleSort()
    {
        $list = [5, 90, 23, 5, 67, 87, 12, 2, 3, 9];
        $sortedList = $this->bubbleSort($list);
        return view('bubble-sort', [
            'originalArray' => $list,
            'sortedArray' => $sortedList
        ]);
    }
}
