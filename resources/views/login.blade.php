@include("partial.header")

<form action="{{ route("login") }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <h2>Inloggen</h2>
    <label>Username</label>
    <input type="text" name="username" placeholder="Username">

    <label>Password</label>
    <input type="text" name="password" placeholder="Password">

    <button type="submit">Login</button>
</form>
@include("partial.footer")
