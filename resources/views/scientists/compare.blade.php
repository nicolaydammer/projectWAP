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



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>