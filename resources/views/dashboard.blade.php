@include("partial.header")
<h2 id="dashboard-title">Dashboard</h2>
<p id="dashboard-welkom-text">Welkom, test</p>
<main>
    <table class="dashbord-table">
        <tr class="vakjes">
            <th class="sortable" data-sortby="station.name">Weerstation <i class="fa-solid fa-sort"></i></th>
            <th class="sortable" data-sortby="station.longitude">Stad <i class="fa-solid fa-sort"></i></th>
            <th class="sortable" data-sortby="station.latitude">Status <i class="fa-solid fa-sort"></i></th>
        </tr>

        @foreach($stations->items() as $station)
            <tr id="{{ $station->id }}">
                <td>{{ $station->name }}</td>
                <td>{{ $station->longitude }}</td>
                <td>{{ $station->latitude }}</td>
            </tr>
        @endforeach
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item @if($stations->currentPage() === 1) disabled @endif">
                <a class="page-link" href="{{ route('dashboard', ['page' => 1]) }}">
                    Eerste
                </a>
            </li>
            <li class="page-item @if($stations->currentPage() === 1) disabled @endif">
                <a class="page-link"
                   href="{{ route('dashboard', ['page' => $stations->currentPage() - 1]) }}">
                    Vorige
                </a>
            </li>
            @for(
    $i = ($stations->currentPage() >= 2 ? $stations->currentPage() - 1 : 1);
    $i < $stations->currentPage() + ($stations->currentPage() > 1 ? 2 : 3);
    $i++)
                <li class="page-item @if($stations->currentPage() === $i) active @endif @if($i > $stations->lastPage()) disabled @endif">
                    <a class="page-link" href="{{ route('dashboard', ['page' => $i]) }}">
                        {{ $i }}
                    </a>
                </li>
            @endfor
            <li class="page-item @if($stations->currentPage() === $stations->lastPage()) disabled @endif">
                <a class="page-link" href="{{ route('dashboard', ['page' => $stations->currentPage() + 1]) }}">
                    Next
                </a>
            </li>
            <li class="page-item @if($stations->currentPage() === $stations->lastPage()) disabled @endif">
                <a class="page-link" href="{{ route('dashboard', ['page' => $stations->lastPage()]) }}">
                    Laatste
                </a>
            </li>
        </ul>
    </nav>
</main>
@include("partial.footer")