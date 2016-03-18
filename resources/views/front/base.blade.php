<!DOCTYPE html>
<html data-wf-site="56298a4d4cda124d7a7e770c" data-wf-page="56298a4d4cda124d7a7e770d">
<head>
    <meta charset="utf-8">
    <title>Expeditionist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Webflow">
    <link rel="stylesheet" href="{{ elixir('css/fapp.css') }}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    @yield('head')
    <script>
        WebFont.load({
            google: {
                families: ["Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic","Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Neuton:200,300,regular,italic,700,800","Arvo:regular,italic,700,700italic","Permanent Marker:regular","Gochi Hand:regular","Special Elite:regular","Rancho:regular","Bubblegum Sans:regular","Martel:200,300,regular,600,700,800,900"]
            }
        });
    </script>
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
    <script type="text/javascript" src="/js/modernizr.js"></script>
</head>
<body>
@yield('content')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/webflow.js"></script>
<script src="/js/front.js"></script>
<!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
@yield('bodyscripts')
</body>
</html>
