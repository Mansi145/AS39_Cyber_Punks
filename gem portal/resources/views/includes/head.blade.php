<title>{{ config('app.name') }}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="theme-color" content="#999">
<!-- Global site tag (gtag.js) - Google Analytics -->



<!--  Font Awesome  -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- Bootstrap core CSS -->
<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="{{ url('css/mdb.css') }}" rel="stylesheet">
<link href="{{ url('css/style.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />



<script>
 if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/service-worker.js')
      .then(function(reg){
     }).catch(function(err) {
    });
 }
</script>
<link rel="manifest" href="/manifest.json">

<link rel="icon" href="/img/icon_32.png" type="image/png">

<link rel="apple-touch-icon" href="/img/icon_32.png">

<meta name="theme-color" content="#F7F8F9"/>

@yield('css')