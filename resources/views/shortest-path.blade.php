<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shortest Path</title>
</head>
<body>
<h2>Graph:</h2>

<ul>
    @foreach ($graph as $vertex => $neighbors)
        <li>{{ $vertex }}: {{ implode(', ', $neighbors) }}</li>
    @endforeach
</ul>
<h3>Shortest Path from {{ $startVertex }} to {{ $endVertex }}</h3>
@if ($shortestPath)
    <p>Path: {{ implode(' => ', $shortestPath) }}</p>
@else
    <p>No path found</p>
@endif


</body>
</html>
