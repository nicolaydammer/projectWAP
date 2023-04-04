
@include("partial.header")
<h1 id="dashboard-title">Dashboard</h1>
<p id="dashboard-welcome-text">Welkom, {{ $name }}</p>

<table class="dashboard-table">
    <tr class="vakjes">
        <th>Weerstation</th>
        <th>Stad</th>
        <th>Status</th>
    </tr>
    @foreach($stations as $station)
        <tr>
            <td>{{$station['id']}}</td>
            <td>{{$station['city']}}</td>
            <td>{{$station['status']}}</td>
        </tr>
    @endforeach
</table>
