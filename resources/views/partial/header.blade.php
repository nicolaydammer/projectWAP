<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
    <title>Project WAP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="{{ asset('img/LogoIWA.jpg') }}" alt="IWA Logo" width="70" height="70">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/scientist">Wetenschapper</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="/administratie">Administratie</a>
                </li>
            </ul>
        </div>
    </nav>

</head>
<body>