{{--@include("partial.header")--}}
<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full text-md bg-white shadow-md rounded mb-4">
                            <tbody>
                            <tr class="border-b">
                                <td class="p-3 px-5 flex">
                                </td>

                            </tr>

                            <tr class="border-b">
                                <th class="text-left p-3 px-5 sortable" data-sortby="station.name"><a href="{{
                                    route('dashboard', [
                                    'page' => $stations->currentPage(),
                                    'filter' => ['order_by' => 'stations.name', 'order' => 'asc']
                                    ])
                                    }}">Weerstation <i class="fa-solid fa-sort"></i></a>
                                </th>
                                <th class="text-left p-3 px-5 sortable" data-sortby="station.longitude"><a href="{{
                                    route('dashboard', [
                                    'page' => $stations->currentPage(),
                                    'filter' => ['order_by' => 'stations.name', 'order' => 'asc']
                                    ])
                                    }}">Stad <i class="fa-solid fa-sort"></i></a>
                                </th>
                                <th class="text-left p-3 px-5 sortable" data-sortby="station.latitude"><a href="{{
                                    route('dashboard', [
                                    'page' => $stations->currentPage(),
                                    'filter' => ['order_by' => 'stations.name', 'order' => 'asc']
                                    ])
                                    }}">Status <i class="fa-solid fa-sort"></i></a>
                                </th>
                                <th></th>
                            </tr>
                            @foreach($stations->items() as $station)
                                <tr class="border-b hover:bg-orange-100 bg-gray-100" id="{{ $station->id }}">
                                    <td class="p-3 px-5">{{ $station->name }}</td>
                                    <td class="p-3 px-5">{{ $station->longitude }} {{ $station->latitude }}</td>
                                    <td class="p-3 px-5">OK</td>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="px-3 py-4 flex justify-center">
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

                        <form action="{{ route('dashboard.search') }}" method="get">
                            <label for="search">
                                Station naam: <input type="search" name="name" />
                            </label>
                            <input type="submit" value="Zoeken">
                        </form>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
@include("partial.footer")