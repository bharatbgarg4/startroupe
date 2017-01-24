<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="" />
    <meta name="description" content=""/>
    <link href="/logo.png" rel="icon" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Startroupe</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    @yield('headinclude')
  </head>
  <body>
    <div id="fold">
    @include('partials.elements.nav')
      @yield('maincontent')
    </div>
    @include('partials.notifications')
    @include('partials.elements.footer')
  <script src="{{ elixir('js/all.js') }}"></script>
      @yield('footinclude')
  </body>
</html>