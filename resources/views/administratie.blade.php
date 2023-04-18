<x-app-layout>


    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form id="add-subscription-form" action="{{route('customer.store')}}" method="POST">
                    {{--                <form method="POST" action="{{ route('users.store') }}">--}}
                    {{--                    @csrf--}}
                    @csrf
                    <label for="customerName">Naam klant:</label><br>
                    <input type="text" id="customerName" name="customerName" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><br>
                    <label for="frequency">Data update frequentie per:</label>
                    <select id="frequency" name="frequency" class="block mt-1 w-full rounded-md">
                        <option value="24">24 uur</option>
                        <option value="12">12 uur</option>
                        <option value="6">6 uur</option>
                        <option value="1">Uur </option>
                        <option value="60">Minuut</option>
                    </select>
                    {{-- bij 24, 12 of 6, Tijdstip bepalen--}}
                    <label for="time">Tijdstip</label><br>
                    <input type="time" id="time" name="time" class="block  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <br>
                    <label for="weatherDataType">Types data</label><br>
                    <input type="checkbox" id="temperature" name="customerDataList['temperature']" value="1">
                    <label for="temperature"> Temperatuur</label><br>

                    <input type="checkbox" id="precipitation" name="customerDataList['precipitation']" value="2" >
                    <label for="precipitation"> Neerslag</label><br>

                    <input type="checkbox" id="dewpoint" name="customerDataList['dewpoint']" value="3">
                    <label for="dewpoint"> Dauwpunt</label><br>

                    <input type="checkbox" id="stdPressure" name="customerDataList['stdPressure']" value="4">
                    <label for="stdPressure"> Standaard druk</label><br>

                    <input type="checkbox" id="seaLevelPressure" name="customerDataList['seaLevelPressure']" value="5">
                    <label for="seaLevelPressure"> Druk op zeeniveau</label><br>

                    <input type="checkbox" id="visibility" name="customerDataList['visibility']" value="6">
                    <label for="visibility"> Zichtbaarheid</label><br>

                    <input type="checkbox" id="windSpeed" name="customerDataList['windSpeed']" value="7">
                    <label for="windSpeed"> Windsnelheid</label><br>

                    <input type="checkbox" id="snowDepth" name="customerDataList['snowDepth']" value="8">
                    <label for="snowDepth"> Sneeuw diepte</label><br>

                    <input type="checkbox" id="humidity" name="customerDataList['humidity']" value="9">
                    <label for="humidity"> Luchtvochtigheid</label><br>

                    <input type="checkbox" id="cloudCover" name="customerDataList['cloudCover']" value="10">
                    <label for="cloudCover"> Bewolking</label><br>

                    <input type="checkbox" id="windDir" name="customerDataList['windDir']" value="11">
                    <label for="windDir"> Windrichting</label><br><br>

                    <label for="latitude">lengtegraad</label><br>
                    <input type="text" id="latitude" name="latitude" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <label for="longitude">breedtegraad</label><br>
                    <input type="text" id="longitude" name="longitude" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <label for="country">Land</label><br>
                    <input type="text" id="country" name="country" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <label for="timezone">Tijdzone</label><br>
                    <input type="text" id="timezone" name="timezone" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <br>
                    <input type="submit" value="Klant toevoegen" id="klant-submit-button" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">

                </form>
            </div>
        </div>
    </div>
</x-app-layout>