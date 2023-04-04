
@include("partial.header")
<h1 id="dashboard-title">Dashboard</h1>
<p id="dashboard-welkom-text">Welkom, {{ $name }}</p>

<table class="dashbord-table">
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



<div class="tweede-tabel">

    <main>
        <div class="dashboard-table-2" id="dashboard-table-2"></div>
        <div data-page="1" class="pagenumber" id="pagination"></div>
    </main>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@include("partial.footer")
