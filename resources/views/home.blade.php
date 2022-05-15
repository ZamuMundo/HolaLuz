<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Navbar</a>
                <form class="d-flex"  action="/home" method="POST">
                    {{ csrf_field() }}
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search CUPS">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="container">

            <div class="row">
                <h2> HOLA LUZ OFFERT</h2>
            </div>
            <div class="row">
                @if($success)
                    DATOS CLIENTE
                    <ul>
                        <li>NAME: {{ $client->full_name }}</li>
                        <li>ADDRESS: {{ $client->address }}</li>
                        <li>CUPS: {{ $client->cups }}</li>
                        <li>ROLE: {{ $client->role }}</li>
                        <li>BUILDING TYPE: {{ $client->building_type }}</li>
                        <li>EMAIL: {{ $client->email }}</li>
                        <li>PASSWORD: {{ $client->password }}</li>
                    </ul>

                    INFO SUPPLY POINT
                    <ul>
                        <li>CUPS: {{ $points->cups }}</li>
                        <li>TARIFF: {{ $points->tariff }}</li>
                        <li>INVOICED AMOUNT: {{ $points->invoiced_amount }}</li>
                        <li>POWER P1: {{ $points->power->p1 }}</li>
                        <li>POWER P2: {{ $points->power->p2 }}</li>
                    </ul>

                    @if($isOffer)
                        <h3 class="text-success">The offer is 5% discunt</h3>
                    @else
                        <h3 class="text-danger">Not Offers</h3>
                    @endif
                @else
                    @if($error)
                        <h3 class="text-danger">Not Found</h3>
                    @endif
                @endif
            </div>
        </div>

    </body>
</html>
