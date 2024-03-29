<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full text-md bg-white shadow-md rounded mb-4">
                            <tbody>
                            <tr class="border-b">
                                <td class="p-3 px-5 flex">
                                    <a type="button" class="text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" href="{{ route('customers.create') }}">Klant toevoegen</a>
                                </td>

                            </tr>

                            <tr class="border-b">
                                <th class="text-left p-3 px-5">ID</th>
                                <th class="text-left p-3 px-5">Name</th>
                                <th class="text-left p-3 px-5">Contract</th>
                                <th></th>
                            </tr>
                            @foreach($customers as $customer)
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <td class="p-3 px-5">{{ $customer->id }}</td>
                                    <td class="p-3 px-5">{{ $customer->name }}</td>
                                    <td class="p-3 px-5">{{ $customer->customerable->id }}</td>

                                    <td class="p-3 px-5">


                                    </td>
                                    <td class="p-3 px-5 flex justify-end">


                                    </td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>