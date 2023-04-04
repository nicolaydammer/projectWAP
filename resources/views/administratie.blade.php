@include("partial.header")
<h1>Administratie</h1>

<p id="administration-form-welcome">Nieuw contract formulier</p>
<form id="add-subscription-form" >
    <label for="cname">Naam klant:</label><br>
    <input type="text" id="cname" name="cname"><br>
    <label for="datafreq">Data update frequentie per:</label>
    <select id="datafreq" name="datafreq">
        <option value="freq1">24 uur</option>
        <option value="freq2">12 uur</option>
        <option value="freq3">6 uur</option>
        <option value="freq4">Uur </option>
        <option value="freq5">Minuut</option>
    </select>

    <br>
    <input type="submit" value="Klant toevoegen" id="klant-submit-button">
    <br>
</form>
@include("partial.footer")