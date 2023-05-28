<?php

namespace App\Http\Controllers;

class QuickSortController
{
    function quickSort($array)
    {
        $length = count($array);

        // Базовый случай: если массив пустой или содержит только один элемент, он уже отсортирован
        if ($length <= 1) {
            return $array;
        }

        // Выбираем опорный элемент
        $pivot = $array[0];

        // Инициализируем массивы для меньших и больших элементов
        $left = [];
        $right = [];

        // Разделяем массив на подмассивы, меньшие и большие опорного элемента
        for ($i = 1; $i < $length; $i++) {
            if ($array[$i] < $pivot) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }

        // Рекурсивно сортируем подмассивы
        $left = $this->quickSort($left);
        $right = $this->quickSort($right);

        // Объединяем отсортированные подмассивы вместе с опорным элементом
        return array_merge($left, [$pivot], $right);
    }


    public function testQuickSort()
    {
        $list = [8, 90, 20, 12, 86, 57, 23, 4, 77];
        $sortedArray = $this->quickSortPivotMid($list);
        return view('quick-sort', ['list'=>$list,'sortedArray' => $sortedArray]);
    }

    function quickSortPivotMid($array) {
        $length = count($array);

        // Базовый случай: если массив пустой или содержит только один элемент, он уже отсортирован
        if ($length <= 1) {
            return $array;
        }

        // Выбираем опорный элемент из середины массива
        $pivotIndex = floor($length / 2);
        $pivot = $array[$pivotIndex];

        // Инициализируем массивы для меньших и больших элементов
        $left = [];
        $right = [];

        // Разделяем массив на подмассивы, меньшие и большие опорного элемента
        for ($i = 0; $i < $length; $i++) {
            if ($i == $pivotIndex) {
                continue; // Пропускаем опорный элемент
            }

            if ($array[$i] < $pivot) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }

        // Рекурсивно сортируем подмассивы
        $left = $this->quickSortPivotMid($left);
        $right = $this->quickSortPivotMid($right);

        // Объединяем отсортированные подмассивы вместе с опорным элементом
        return array_merge($left, [$pivot], $right);
    }




}
