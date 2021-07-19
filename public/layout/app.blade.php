<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta-tags')
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap Reboot CSS -->
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
	<!-- Main CSS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108349638-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-108349638-1');
    </script>
    @yield('schema-org-web')
    @yield('schema-org-church')
</head>
<body>
{{-- <?php include_once("analyticstracking.php")?> --}}
    @include('public/layout.header')
    @yield('content')
    @include('public/layout.footer')
</body>
</html>
