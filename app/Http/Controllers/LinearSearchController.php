<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinearSearchController
{
    public function linearSearch($array, $item): bool|int|string
    {
        foreach ($array as $key => $value) {
            if ($value == $item) {
                return $key;
            }
        }
        return false;
    }

    public function performLinearSearch(Request $request)
    {
        $end = $request->input('end');
        $item = $request->input('number');
        $nums = range(1, $end);

        $start1 = microtime(true);
        $result1 = $this->linearSearch($nums, $item);
        $time1 = round(microtime(true) - $start1, 10);

        $start2 = microtime(true);
        $result2 = array_search($item, $nums);
        $time2 = round(microtime(true) - $start2, 10);

        return view('linear-search-result', compact('result1', 'result2', 'time1', 'time2'));
    }



}
