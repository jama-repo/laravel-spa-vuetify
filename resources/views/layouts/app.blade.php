<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/icons.css')}}">
    @yield('styles')
</head>
<body>

<div id="parentLoader">
    <div id="preloader">
        <span></span><span></span>
    </div>
</div>

@yield('content')

</body>
<!-- Scripts -->
<script type="text/javascript">
document.title='Home';
window.onload =function(event) {
    var spinner = document.querySelector('#parentLoader');
    spinner.style.opacity='0';
    setTimeout(function(){
        spinner.remove();
    },1000)
};
</script>
</body>
@yield('script')
</html>
