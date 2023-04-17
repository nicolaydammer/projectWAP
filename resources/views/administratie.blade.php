@include("partial.header")
<h1>Administratie</h1>

<p id="administration-form-welcome">Nieuw contract formulier</p>
<br>
<form id="add-subscription-form" action="{{route('customer.store')}}" method="POST">
    @csrf
    <label for="customerName">Naam klant:</label><br>
    <input type="text" id="customerName" name="customerName"><br>
    <label for="dataFreq">Data update frequentie per:</label>
    <select id="dataFreq" name="dataFreq">
        <option value="freq1">24 uur</option>
        <option value="freq2">12 uur</option>
        <option value="freq3">6 uur</option>
        <option value="freq4">Uur </option>
        <option value="freq5">Minuut</option>
    </select>
    <br>
    <label for="weatherDataType">Types data</label><br>
    <input type="checkbox" id="temperature" name="customerDataList[]" value="1">
    <label for="temperature"> Temperatuur</label><br>

    <input type="checkbox" id="precipitation" name="customerDataList[]" value="2">
    <label for="precipitation"> Neerslag</label><br>

    <input type="checkbox" id="dewpoint" name="customerDataList[]" value="3">
    <label for="dewpoint"> Dauwpunt</label><br>

    <input type="checkbox" id="stdPressure" name="customerDataList[]" value="4">
    <label for="stdPressure"> Standaard druk</label><br>

    <input type="checkbox" id="sealevelPressure" name="customerDataList[]" value="5">
    <label for="sealevelPressure"> Druk op zeeniveau</label><br>

    <input type="checkbox" id="visibility" name="customerDataList[]" value="6">
    <label for="visibility"> Zichtbaarheid</label><br>

    <input type="checkbox" id="wind_speed" name="customerDataList[]" value="7">
    <label for="wind_speed"> Windsnelheid</label><br>

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