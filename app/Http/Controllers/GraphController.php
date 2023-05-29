<?php

namespace App\Http\Controllers;

use SplQueue;

class GraphController
{
    private function breadthFirstSearch($graph, $startVertex, $endVertex)
    {
        // Проверка на случай отсутствия начальной или конечной вершины
        if (!isset($graph[$startVertex]) || !isset($graph[$endVertex])) {
            return null;
        }
        $queue = new SplQueue(); // Очередь для обхода вершин
        $visited = []; // Посещенные вершины
        $path = []; // Путь от начальной вершины до текущей вершины
        $found = false; // Флаг, указывающий на найденную конечную вершину
        // Инициализация: добавляем начальную вершину в очередь и помечаем ее посещенной
        $queue->enqueue($startVertex);
        $visited[$startVertex] = true;
        echo "Breadth-First Search Steps:\n";

        while (!$queue->isEmpty()) {
            $currentVertex = $queue->dequeue();
            echo "Visiting vertex: $currentVertex\n";

            // Проверяем, является ли текущая вершина конечной
            if ($currentVertex === $endVertex) {
                $found = true;
                break;
            }
            // Перебираем соседние вершины текущей вершины
            foreach ($graph[$currentVertex] as $neighbor) {
                if (!isset($visited[$neighbor])) {
                    echo "Adding neighbor: $neighbor to the queue\n";

                    // Если соседняя вершина не посещена, добавляем ее в очередь и помечаем как посещенную
                    $queue->enqueue($neighbor);
                    $visited[$neighbor] = true;
                    $path[$neighbor] = $currentVertex; // Сохраняем путь от начальной вершины до текущей вершины
                }
            }
        }
        if (!$found) {
            return null; // Конечная вершина не достижима из начальной вершины
        }
        echo "Shortest Path Steps:\n";

        // Восстановление пути
        $shortestPath = [];
        $currentVertex = $endVertex;
        while ($currentVertex !== $startVertex) {
            echo "Adding vertex: $currentVertex to the shortest path\n";
            $shortestPath[] = $currentVertex;
            $currentVertex = $path[$currentVertex];}
        $shortestPath[] = $startVertex;
        $shortestPath = array_reverse($shortestPath);
        return $shortestPath;}
    public function shortestPath(){
        $graph = [
            'A' => ['B', 'C'],
            'B' => ['A', 'D'],
            'C' => ['A', 'D', 'E'],
            'D' => ['B', 'C', 'E'],
            'E' => ['C', 'D']];
        $startVertex = 'A';
        $endVertex = 'E';
        $shortestPath = $this->breadthFirstSearch($graph, $startVertex, $endVertex);
        return view('shortest-path', compact('startVertex',
            'endVertex', 'shortestPath', 'graph'));
    }
}
