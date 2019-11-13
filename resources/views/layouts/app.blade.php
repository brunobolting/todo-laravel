<!DOCTYPE html>
<html lang="en">

<head>
   <title>Laravel Quickstart - Basic</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- CSS And JavaScript -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
   <!-- <div class="container">
      <nav class="navbar navbar-default">
   </nav>
   </div>
   -->

   @yield('content')

   <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>