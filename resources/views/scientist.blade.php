@include("partial.header")
<h1>Wetenschapper</h1>
<p id="scientist-welcome-text"></p>
<table class="dashboard-table">
    <tr class="cells">
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
<br>


@include("partial.footer")