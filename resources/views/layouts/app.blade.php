<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css" integrity="sha512-9my9Mb2+0YO+I4PUCSwUYO7sEK21Y0STBAiFEYoWtd2VzLEZZ4QARDrZ30hdM1GlioHJ8o8cWQiy8IAb1hy/Hg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <title>Gestión de terceros</title>
    @csrf
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        @yield('items')
                    </div>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-12 p-4">
                <div class="card mx-auto" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center"> @yield('titulo')</h5>
                        <br>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="{{ asset('js/ajaxData.js') }}"></script>
</body>

</html>
