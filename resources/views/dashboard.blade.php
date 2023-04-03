
@include("partial.header")
<h1 id="dashboard-title">Dashboard</h1>
<p id="dashboard-welkom-text">Welkom, {{ $name }}</p>

<table class="dashbord-table">
    <tr class="vakjes">
        <th>Weerstation</th>
        <th>Status</th>
        <th>Land</th>
    </tr>
    <tr class="vakjes">
        <td>248852</td>
        <td>Online</td>
        <td>Groningen</td>
    </tr>
    <tr class="vakjes">
        <td>265440</td>
        <td>Error!</td>
        <td>Maastricht</td>
    </tr>
    <tr class="vakjes">
        <td>385647</td>
        <td>Online</td>
        <td>New York</td>
    </tr>
    <tr class="vakjes">
        <td>429850</td>
        <td>Online</td>
        <td>Caïro</td>
    </tr>
    <tr class="vakjes">
        <td>437829</td>
        <td>Error!</td>
        <td>Hawaii</td>
    </tr>
    <tr class="vakjes">
        <td>991029</td>
        <td>Online</td>
        <td>Honkong</td>
    </tr>
    <tr class="vakjes">
        <td>726617</td>
        <td>Online</td>
        <td>Stockholm</td>
    </tr>
    <tr class="vakjes">
        <td>429850</td>
        <td>Online</td>
        <td>Caïro</td>
    </tr>
</table>


@include("partial.footer")
