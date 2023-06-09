<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class BinarySearchController extends Controller
{
    public function binarySearch($list, $item)
    {
        $low = 0;
        $high = count($list) - 1;

        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);
            $guess = $list[$mid];

            if ($guess == $item) {
                return $mid;
            }

            if ($guess > $item) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return null;
    }


    function binarySearchWithCollection(Collection $collection, $item)
    {
        $low = 0;
        $high = $collection->count() - 1;

        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);
            $guess = $collection->get($mid);

            if ($guess === $item) {
                return $mid;
            }

            if ($guess > $item) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return null;
    }


    public function test()
    {
        $myList = [1, 3, 5, 7, 9];
        $item = 3;

        $result = $this->binarySearch($myList, $item);

        if ($result !== null) {
            echo "Item found at index: " . $result;
        } else {
            echo "Item not found.";
        }
    }

    public function testBinarySearchWithCollection(): void
    {
        // Generate the list from the "records" table
        $myList = collect(DB::table('records')->pluck('value')->toArray());

        $item = 999; // The item you want to search for

        $result = $this->binarySearchWithCollection($myList,
            $item);

        if ($result !== null) {
            echo "Item found at index: " . $result;
        } else {
            echo "Item not found.";
        }
    }

    public function testBinarySearchWithNames()
    {
        // Retrieve the names from the "names" table and sort them
        $names = DB::table('names')->pluck('name')
            ->toArray();
        sort($names);

        $item = 'Willis Borer'; // The name you want to search for

        $result = $this->binarySearch($names, $item);

        if ($result !== null) {
            echo "Name $item found at index: $result";
        } else {
            echo "Name not found.";
        }
    }

    public function binarySearchRecursive($list, $item, $low = 0, $high = null)
    {
        if ($high === null) {
            $high = count($list) - 1;
        }

        if ($low > $high) {
            return null;
        }

        $mid = floor(($low + $high) / 2);
        $guess = $list[$mid];

        if ($guess == $item) {
            return $mid;
        }

        if ($guess > $item) {
            return $this->binarySearchRecursive($list, $item, $low, $mid - 1);
        } else {
            return $this->binarySearchRecursive($list, $item, $mid + 1, $high);
        }
    }
        public function testBinarySearchRecursive()
    {
        $list = [2, 5, 8, 12, 16, 23, 38, 56, 72, 91];
        $item = 23;
        $index = $this->binarySearchRecursive($list, $item);

        if ($index !== null) {
            echo "Элемент найден на позиции: $index";
        } else {
            echo "Элемент не найден";
        }
    }

}


