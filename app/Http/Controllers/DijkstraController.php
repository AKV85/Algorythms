<?php

namespace App\Http\Controllers;

use SplPriorityQueue;

class DijkstraController
{
    function dijkstra($graph, $startVertex, $endVertex): ?array
    {
        // Проверка на случай отсутствия начальной или конечной вершины
        if (!isset($graph[$startVertex]) || !isset($graph[$endVertex])) {
            return null;
        }
        // Инициализация
        $distances = []; // Расстояния от начальной вершины до каждой вершины
        $visited = []; // Посещенные вершины
        $previous = []; // Предыдущая вершина на пути от начальной вершины
        $queue = new SplPriorityQueue(); // Очередь с приоритетом для выбора вершин

        foreach ($graph as $vertex => $edges) {
            $distances[$vertex] = PHP_INT_MAX; // Устанавливаем начальные расстояния как бесконечность
            $previous[$vertex] = null; // Начальные предыдущие вершины не определены
        }

        $distances[$startVertex] = 0; // Расстояние от начальной вершины до себя равно 0
        $queue->insert($startVertex, 0); // Добавляем начальную вершину в очередь с приоритетом

        echo "Dijkstra Steps:\n<br>";

        while (!$queue->isEmpty()) {
            $currentVertex = $queue->extract(); // Извлекаем вершину с наименьшим приоритетом
            echo "<b>Visiting vertex: $currentVertex\n</b><br>";

            if ($currentVertex === $endVertex) {
                break; // Достигли конечной вершины, завершаем алгоритм
            }

            if (!isset($visited[$currentVertex])) {
                $visited[$currentVertex] = true; // Помечаем текущую вершину как посещенную

                foreach ($graph[$currentVertex] as $neighbor => $weight) {
                    $totalDistance = $distances[$currentVertex] + $weight;
                    echo "with Neighbors: $neighbor Total Distance: $totalDistance\n<br>";

                    if ($totalDistance < $distances[$neighbor]) {
                        echo "Change if $totalDistance < $distances[$neighbor]<br>";
                        $distances[$neighbor] = $totalDistance; // Обновляем расстояние до соседней вершины
                        $previous[$neighbor] = $currentVertex; // Устанавливаем текущую вершину как предыдущую для соседней вершины
                        $queue->insert($neighbor,
                            -$totalDistance); // Добавляем соседнюю вершину в очередь с новым приоритетом
                    }
                }
            }
        }

        // Восстановление пути
        $path = [];
        $currentVertex = $endVertex;

        while ($currentVertex !== null) {
            $path[] = $currentVertex;
            $currentVertex = $previous[$currentVertex];
        }

        $path = array_reverse($path);

        return [
            'path' => $path, // Кратчайший путь от начальной вершины до конечной вершины
            'distance' => $distances[$endVertex] // Длина кратчайшего пути
        ];
    }

    public function testDijkstra()
    {
        $graph = [
            'A' => ['B' => 5, 'C' => 1],
            'B' => ['A' => 5, 'D' => 1, 'E' => 2],
            'C' => ['A' => 1, 'D' => 2],
            'D' => ['B' => 1, 'C' => 2, 'E' => 4],
            'E' => ['B' => 2, 'D' => 4]
        ];

        $startVertex = 'A';
        $endVertex = 'E';

        $result = $this->dijkstra($graph, $startVertex, $endVertex);

        $shortestPath = $result['path'];
        $distance = $result['distance'];

        return view('dijkstra', compact('shortestPath', 'distance'));

    }

}
