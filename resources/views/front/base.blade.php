<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Expeditionist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('css')
        <script>
            !function(a){"use strict";var b=function(b,c,d){var g,e=a.document,f=e.createElement("link");if(c)g=c;else{var h=(e.body||e.getElementsByTagName("head")[0]).childNodes;g=h[h.length-1]}var i=e.styleSheets;f.rel="stylesheet",f.href=b,f.media="only x",g.parentNode.insertBefore(f,c?g:g.nextSibling);var j=function(a){for(var b=f.href,c=i.length;c--;)if(i[c].href===b)return a();setTimeout(function(){j(a)})};return f.onloadcssdefined=j,j(function(){f.media=d||"all"}),f};"undefined"!=typeof module?module.exports=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
            loadCSS('{{ elixir('css/fapp.css') }}');
        </script>
    @show
    <script type="text/javascript">
        webFontLoadObj = {
            google: {
                families: ["Ubuntu:300,400,700","Arvo:regular,italic,700,700italic"]
            }
        };
        (function() {
            var tk = document.createElement('script');
            tk.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js';
            tk.type = 'text/javascript';
            tk.async = 'true';
            tk.onload = tk.onreadystatechange = function() {
                var rs = this.readyState;
                if (rs && rs != 'complete' && rs != 'loaded') return;
                try { WebFont.load(webFontLoadObj); } catch (e) {}
            };
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(tk, s);
        })();
    </script>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#dc5744">
    @yield('head')

    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
</head>
<body>
@yield('content')
<script src="/js/front.js"></script>
<!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
@yield('bodyscripts')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-51468211-8', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
