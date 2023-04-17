<x-app-layout>





    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <div class="columns-3">

                        <form method="POST" action="{{route('vergelijkstations')}}">
                            @csrf
                            <div class="col-span-1">
                                <button type="submit" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Vergelijk</button>
                            </div>
                            <div class="col-span-1">
                                <select class="form-control" name="weatherstation1">

                                    <option>Select Station</option>

                                    @foreach ($stations as $id=> $name)

                                        <option value="{{ $id }}" >

                                            {{ $name }}

                                        </option>

                                    @endforeach

                                </select>
                            </div>
                            <div class="col-span-1">
                                <select class="form-control" name="weatherstation2">

                                    <option>Select Station</option>

                                    @foreach ($stations as $id=> $name)

                                        <option value="{{ $id}}" >

                                            {{ $name}}

                                        </option>

                                    @endforeach

                                </select>
                            </div>

                        </form>
                    </div>
                    <div class="px-3 py-4 flex justify-center">

                        <table class="w-full text-md bg-white shadow-md rounded mb-4">
                            <tbody>
                            <tr class="border-b">
                                <td class="p-3 px-5 flex">
{{--                                    <a type="button" class="text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" href="{{ route('users.create') }}">Create User</a>--}}

                                </td>

                            </tr>

                            <tr class="border-b">
                                <th class="text-left p-3 px-5">Naam</th>
                                <th class="text-left p-3 px-5">{{$station1 ->name}}</th>
                                <th class="text-left p-3 px-5">{{$station2 ->name}}</th>
                                <th></th>
                            </tr>
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <th class="text-left p-3 px-5">Longitude</th>
                                    <td class="p-3 px-5">{{ $station1->longitude }}</td>
                                    <td class="p-3 px-5">{{ $station2->longitude }}</td>
                                </tr>

                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <td class="p-3 px-5">Latitude</td>
                                    <td class="p-3 px-5">{{ $station1->latitude }}</td>
                                    <td class="p-3 px-5">{{ $station2->latitude }}</td>
                                </tr>

                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Elevation</td>
                                <td class="p-3 px-5">{{ $station1->elevation }}</td>
                                <td class="p-3 px-5">{{ $station2->elevation }}</td>
                            </tr>

                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Temperature</td>
                                <td class="p-3 px-5">{{ $data1->temperature }}</td>
                                <td class="p-3 px-5">{{ $data2->temperature }}</td>
                            </tr>

                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Dewpoint</td>
                                <td class="p-3 px-5">{{ $data1->dewpoint }}</td>
                                <td class="p-3 px-5">{{ $data2->dewpoint }}</td>
                            </tr>
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Standard Pressure</td>
                                <td class="p-3 px-5">{{ $data1->standard_pressure }}</td>
                                <td class="p-3 px-5">{{ $data2->standard_pressure }}</td>
                            </tr>
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Sea Level Pressure</td>
                                <td class="p-3 px-5">{{ $data1->sea_level_pressure }}</td>
                                <td class="p-3 px-5">{{ $data2->sea_level_pressure }}</td>
                            </tr>
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Visibility</td>
                                <td class="p-3 px-5">{{ $data1->visibility }}</td>
                                <td class="p-3 px-5">{{ $data2->visibility }}</td>
                            </tr>
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Wind Speed</td>
                                <td class="p-3 px-5">{{ $data1->wind_speed }}</td>
                                <td class="p-3 px-5">{{ $data2->wind_speed }}</td>
                            </tr>

                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Precipitation</td>
                                <td class="p-3 px-5">{{ $data1->precipation }}</td>
                                <td class="p-3 px-5">{{ $data2->precipation }}</td>
                            </tr>

                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Snow Depth</td>
                                <td class="p-3 px-5">{{ $data1->snow_depth }}</td>
                                <td class="p-3 px-5">{{ $data2->snow_depth }}</td>
                            </tr>

                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Humidity</td>
                                <td class="p-3 px-5">{{ $data1->humidity }}</td>
                                <td class="p-3 px-5">{{ $data2->humidity }}</td>
                            </tr>

                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Cloud Cover</td>
                                <td class="p-3 px-5">{{ $data1->cloud_cover }}</td>
                                <td class="p-3 px-5">{{ $data2->cloud_cover }}</td>
                            </tr>

                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Wind Direction</td>
                                <td class="p-3 px-5">{{ $data1->wind_direction }}</td>
                                <td class="p-3 px-5">{{ $data2->wind_direction }}</td>
                            </tr>

                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">Events</td>
                                <td class="p-3 px-5">{{ $data1->events }}</td>
                                <td class="p-3 px-5">{{ $data2->events }}</td>
                            </tr>




                            {{--                            @endforeach--}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>