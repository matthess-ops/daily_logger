<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">


        <a class="navbar-brand" >Client</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteNamed('client.daily-report') ? 'active' : '' }}" href="{{ route('client.daily-report') }}">Rapportage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteNamed('client.activities-logger') ? 'active' : '' }}" href="{{ route('client.activities-logger') }}">Activiteiten</a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteNamed('client.daily-report-vis') ? 'active' : '' }}" href="{{ route('client.daily-report-vis') }}">Rapport vis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteNamed('client.activities-vis') ? 'active' : '' }}" href="{{ route('client.activities-vis') }}">Activiteiten vis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteNamed('client.account') ? 'active' : '' }}" href="{{ route('client.account') }}">Account</a>
              </li>

          </ul>
          <a class="nav-item nav-link justify-content-end text-light" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
</form>
        </div>
    </div>
      </nav>

    <div class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>




</body>

</html>
