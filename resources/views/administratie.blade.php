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
    <input type="checkbox" id="temperature" name="temperatue">
    <label for="temperature"> Temperatuur</label><br>

    <input type="checkbox" id="precipitation" name="precipitation">
    <label for="precipitation"> Neerslag</label><br>

    <input type="checkbox" id="dewpoint" name="dewpoint">
    <label for="dewpoint"> Dauwpunt</label><br>

    <input type="checkbox" id="stdPressure" name="standard pressure">
    <label for="stdPressure"> Standaard druk</label><br>

    <input type="checkbox" id="sealevelPressure" name="Sea level pressure">
    <label for="sealevelPressure"> Druk op zeeniveau</label><br>

    <input type="checkbox" id="visibility" name="visibility">
    <label for="visibility"> Zichtbaarheid</label><br>

    <input type="checkbox" id="wind_speed" name="wind_speed">
    <label for="wind_speed"> Windsnelheid</label><br>

    <input type="checkbox" id="snow_depth" name="snow_depth">
    <label for="snow_depth"> Sneeuw diepte</label><br>

    <input type="checkbox" id="humidity" name="humidity">
    <label for="humidity"> Luchtvochtigheid</label><br>

    <input type="checkbox" id="cloud_cover" name="cloud_cover">
    <label for="cloud_cover"> Bewolking</label><br>

    <input type="checkbox" id="wind_dir" name="wind_dir">
    <label for="wind_dir"> Windrichting</label><br>

    <input type="submit" value="Klant toevoegen" id="klant-submit-button">


</form>

@include("partial.footer")