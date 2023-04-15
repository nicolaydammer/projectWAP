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
{{--                                    <a type="button" class="text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" href="{{ route('users.create') }}">Create User</a>--}}
                                </td>

                            </tr>

                            <tr class="border-b">
{{--                                <th class="text-left p-3 px-5">Weerstation</th>--}}
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
{{--                                <th class="text-left p-3 px-5">Stad</th>--}}
                                <th class="text-left p-3 px-5 sortable" data-sortby="station.latitude"><a href="{{
                                    route('dashboard', [
                                    'page' => $stations->currentPage(),
                                    'filter' => ['order_by' => 'stations.name', 'order' => 'asc']
                                    ])
                                    }}">Status <i class="fa-solid fa-sort"></i></a>
                                </th>
{{--                                <th class="text-left p-3 px-5">Status</th>--}}
                                <th></th>
                            </tr>
                            @foreach($stations->items() as $station)
                                <tr class="border-b hover:bg-orange-100 bg-gray-100" id="{{ $station->id }}">
                                    <td class="p-3 px-5">{{ $station->name }}</td>
                                    <td class="p-3 px-5">{{ $station->longitude }}</td>
                                    <td class="p-3 px-5">{{ $station->latitude }}</td>
                                </tr>
                            @endforeach

{{--                            @foreach($users as $user)--}}
{{--                                <tr class="border-b hover:bg-orange-100 bg-gray-100">--}}
{{--                                    <td class="p-3 px-5">{{ $user->name }}</td>--}}
{{--                                    <td class="p-3 px-5">{{ $user->email }}</td>--}}
{{--                                    <td class="p-3 px-5">--}}

{{--                                        @foreach ($user->roles as $role)--}}
{{--                                            {{$role->name}}--}}
{{--                                        @endforeach--}}


                                    <td class="p-3 px-5 flex justify-end">
{{--                                        <a type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" href="{{ route('users.edit',$user) }}">Edit</a>--}}
{{--                                        <a type="button" class="mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" href="{{ route('users.destroy',$user) }}">Delete</a>--}}


                                    </td>
                                </tr>




{{--                            @endforeach--}}

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



{{--    @include("partial.header")--}}

{{--    <h2 id="dashboard-title">Dashboard</h2>--}}
{{--    <p id="dashboard-welkom-text">Welkom, test</p>--}}
{{--    <main>--}}
{{--        <table class="dashbord-table">--}}
{{--            <tr class="vakjes">--}}

{{--                <th class="sortable" data-sortby="station.name"><a href="{{--}}
{{--    route('dashboard', [--}}
{{--    'page' => $stations->currentPage(),--}}
{{--    'filter' => ['order_by' => 'stations.name', 'order' => 'asc']--}}
{{--    ])--}}
{{--    }}">Weerstation <i class="fa-solid fa-sort"></i></a></th>--}}

{{--                <th class="sortable" data-sortby="station.longitude"><a href="{{--}}
{{--        route('dashboard', [--}}
{{--    'page' => $stations->currentPage(),--}}
{{--    'filter' => ['order_by' => 'stations.name', 'order' => 'asc']--}}
{{--    ])--}}
{{--    }}">Stad <i class="fa-solid fa-sort"></i></a></th>--}}
{{--                <th class="sortable" data-sortby="station.latitude"><a href="{{--}}
{{--        route('dashboard', [--}}
{{--    'page' => $stations->currentPage(),--}}
{{--    'filter' => ['order_by' => 'stations.name', 'order' => 'asc']--}}
{{--    ])--}}
{{--    }}">Status <i class="fa-solid fa-sort"></i></a></th>--}}
{{--            </tr>--}}

{{--            @foreach($stations->items() as $station)--}}
{{--                <tr id="{{ $station->id }}">--}}
{{--                    <td>{{ $station->name }}</td>--}}
{{--                    <td>{{ $station->longitude }}</td>--}}
{{--                    <td>{{ $station->latitude }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        </table>--}}

{{--        <nav aria-label="Page navigation example">--}}
{{--            <ul class="pagination">--}}
{{--                <li class="page-item @if($stations->currentPage() === 1) disabled @endif">--}}
{{--                    <a class="page-link" href="{{ route('dashboard', ['page' => 1]) }}">--}}
{{--                        Eerste--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="page-item @if($stations->currentPage() === 1) disabled @endif">--}}
{{--                    <a class="page-link"--}}
{{--                       href="{{ route('dashboard', ['page' => $stations->currentPage() - 1]) }}">--}}
{{--                        Vorige--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                @for(--}}
{{--        $i = ($stations->currentPage() >= 2 ? $stations->currentPage() - 1 : 1);--}}
{{--        $i < $stations->currentPage() + ($stations->currentPage() > 1 ? 2 : 3);--}}
{{--        $i++)--}}
{{--                    <li class="page-item @if($stations->currentPage() === $i) active @endif @if($i > $stations->lastPage()) disabled @endif">--}}
{{--                        <a class="page-link" href="{{ route('dashboard', ['page' => $i]) }}">--}}
{{--                            {{ $i }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endfor--}}
{{--                <li class="page-item @if($stations->currentPage() === $stations->lastPage()) disabled @endif">--}}
{{--                    <a class="page-link" href="{{ route('dashboard', ['page' => $stations->currentPage() + 1]) }}">--}}
{{--                        Next--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="page-item @if($stations->currentPage() === $stations->lastPage()) disabled @endif">--}}
{{--                    <a class="page-link" href="{{ route('dashboard', ['page' => $stations->lastPage()]) }}">--}}
{{--                        Laatste--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <form action="{{ route('dashboard.search') }}" method="get">--}}
{{--                <label for="search">--}}
{{--                    Station naam: <input type="search" name="name" />--}}
{{--                </label>--}}
{{--                <input type="submit" value="Zoeken">--}}
{{--            </form>--}}
{{--        </nav>--}}
{{--    </main>--}}
</x-app-layout>
@include("partial.footer")