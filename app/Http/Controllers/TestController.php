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
}
