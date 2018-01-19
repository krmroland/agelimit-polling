<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Age Limit Poll</title>
        <link rel="stylesheet" href="/css/admin.css">
       
    </head>
    <body>
    <div class="container-fluid" id="app">
        @include('admin.nav') 
        @yield("content")
    </div>
        <script src="/js/admin.js"></script>
        @if (session()->has('flash_message'))
           <script>
               flash("{{ session('flash_message.message') }}",
                     "{{ session('flash_message.title') }}",
                     "{{ session('flash_message.type')}}")
           </script>
        @endif
        @stack('scripts')
    </body>
</html>
