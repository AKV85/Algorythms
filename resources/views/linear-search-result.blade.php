
<h1>Linear function</h1>
<form action="/linear-search" method="POST">
    @csrf
    <label for="end">End:</label>
    <select name="end" id="end" required>
        <option value="100">100</option>
        <option value="10000">10,000</option>
        <option value="1000000">1,000,000</option>
    </select>
    <label for="number">Number:</label>
    <input type="number" name="number" id="number" value="{{ old('number') }}" required>
    <button type="submit">Search</button>
</form>

@if ($result1 !== false)
    <p>My function - Linear Search: Item found at index: {{ $result1 }}</p>
@else
    <p>My function - Linear Search: Item not found.</p>
@endif

@if ($result2 !== false)
    <p>Php function - array_search: Item found at index: {{ $result2 }}</p>
@else
    <p>Php function - array_search: Item not found.</p>
@endif

<p>My function - Linear Search Time: {{ $time1 }}</p>
<p>Php function - array_search Time: {{ $time2 }}</p>
