@include("partial.header")
<h1>Administratie</h1>

<p id="administration-form-welcome">Nieuw contract formulier</p>
<br>
<form id="add-subscription-form" action="{{route('customer.store')}}" method="POST">
    @csrf
    <label for="customerName">Naam klant:</label><br>
    <input type="text" id="customerName" name="customerName"><br>

    <label for="frequency">Data update frequentie per:</label>
    <select id="frequency" name="frequency">
        <option value="24">24 uur</option>
        <option value="12">12 uur</option>
        <option value="6">6 uur</option>
        <option value="1">Uur </option>
        <option value="60">Minuut</option>
    </select>
{{-- bij 24, 12 of 6, Tijdstip bepalen--}}
    <label for="time">Tijdstip</label><br>
    <input type="time" id="time" name="time">

    <br>
    <label for="weatherDataType">Types data</label><br>
    <input type="checkbox" id="temperature" name="customerDataList['temperature']" value="1">
    <label for="temperature"> Temperatuur</label><br>

    <input type="checkbox" id="precipitation" name="customerDataList['precipitation']" value="2">
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

    <input type="checkbox" id="snow_depth" name="customerDataList[]" value="8">
    <label for="snow_depth"> Sneeuw diepte</label><br>

    <input type="checkbox" id="humidity" name="customerDataList[]" value="9">
    <label for="humidity"> Luchtvochtigheid</label><br>

    <input type="checkbox" id="cloud_cover" name="customerDataList[]" value="10">
    <label for="cloud_cover"> Bewolking</label><br>

    <input type="checkbox" id="wind_dir" name="customerDataList[]" value="11">
    <label for="wind_dir"> Windrichting</label><br>

    <input type="submit" value="Klant toevoegen" id="klant-submit-button">


</form>

@include("partial.footer")