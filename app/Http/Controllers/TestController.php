<?php

namespace App\Http\Controllers;

class TestController
{
    public function LinearSearch($array, $numb)
    {

        foreach ($array as $key => $value) {
            if ($value === $numb) {
                return $key;
            }
        }
        return false;
    }

    public function testLinearSearch()
    {

        $list = range(1, 100);
        $item = 100;
        return $this->LinearSearch($list, $item);
    }

    public function BinarySearch($array, $item)
    {
        // Инициализация переменных для указания нижней и верхней границ диапазона
        $low = 0;
        $high = count($array) - 1;

        // Итерация до тех пор, пока нижняя граница не станет больше верхней
        while ($low <= $high) {
            // Вычисление среднего индекса элемента
            $mid = floor(($low + $high) / 2);

            // Получение элемента из массива среднего индекса
            $numb = $array[$mid];

            // Проверка, равен ли элемент поисковому элементу
            if ($item === $numb) {
                return $mid; // Возвращаем индекс найденного элемента
            }

            // Если поисковый элемент больше, сужаем диапазон поиска до правой половины
            if ($item > $numb) {
                $low = $mid + 1;
            } else {
                // Если поисковый элемент меньше, сужаем диапазон поиска до левой половины
                $high = $mid - 1;
            }
        }

        return null; // Если элемент не найден, возвращаем null
    }

    public function testBinarySearch(): void
    {

        $list = range(1, 100);
        $number = 100;
        $result = $this->BinarySearch($list, $number);
        if ($result !== null) {
            echo "index of number: $number is - $result";
        } else {
            echo "not found";
        }
    }

    public function selectionSort($array)
    {
        $length = count($array);
        for ($i = 0; $i < $length - 1; $i++) {
            $indexMin = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                if ($array[$j] < $array[$indexMin]) {
                    $indexMin = $j;
                }
            }
            if ($indexMin !== $i) {
                $temp = $array[$i];
                $array[$i] = $array[$indexMin];
                $array[$indexMin] = $temp;
            }
        }
        return $array;
    }

    public function testSelectionSort()
    {
        $list = [2, 4, 1, 6, 3, 16, 0];
        $result = $this->selectionSort($list);
        echo implode(", ", $result);
    }

    public function bubbleSort($array)
    {
        $length = count($array);
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $length - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temp = $array[$j + 1];
                    $array[$j + 1] = $array[$j];
                    $array[$j] = $temp;
                }
            }
        }
        return $array;
    }

    public function testBubbleSort()
    {
        $list = [56, 45, 1, 78, 345, 12, 46, 34, 3];
        $sortedArray = $this->bubbleSort($list);
        print_r($sortedArray);
    }

    public function quickSort($array)
    {
        $length = count($array);

        if ($length <= 1) {
            return $array;
        }
        $pivot = $array[0];
        $left = [];
        $right = [];
        for ($i = 1; $i < $length; $i++) {
            if ($pivot > $array[$i]) {
                $left[] = $array[$i];
            } else {
                $right[] = $array[$i];
            }
        }
        $left = $this->quickSort($left);
        $right = $this->quickSort($right);

        return array_merge($left, [$pivot], $right);
    }

    public function testQuickSort()
    {
        $list = [1,90, 12, 15, 3, 76, 34, 67, 44];
        $sortedArray = $this->quickSort($list);
        print_r($sortedArray);
    }

}
