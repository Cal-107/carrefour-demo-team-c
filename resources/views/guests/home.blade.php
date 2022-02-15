<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css' integrity='sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>

    {{-- @include('guests.partials.header') --}}

    {{-- <main>
        @yield('content')
    </main> --}}
    <div id="root"></div>

    {{-- @include('guests.partials.footer') --}}

    <script src="{{ asset('js/front-office.js')}}"></script>
</body>
</html>