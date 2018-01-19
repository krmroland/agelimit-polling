<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:url"  content="http://lawma.ug" />
        <meta property="og:type"  content="lawma:poll" />
        <meta property="og:title" content="Changing  Uganda's Age Limit Bill"/>
        <meta property="og:description" content="As a ugandan do you think the age limit bill should be changed? Follow the link to express your opinion poll and see what the fellow Ugandans are saying."/>
        <meta property="og:image"  content="http://lawma.ug/poll-screenshot.png" />

        <title>Age Limit Poll</title>

        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-100593977-1', 'auto');
        ga('send', 'pageview');
        </script>
        <link rel="stylesheet" href="/css/poll.css">
       
    </head>
    <body class="mt-5 mt-xl-2">
        @yield("content")
        @stack('scripts')
        @include('flash')
    </body>
</html>
