<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Canvas Print</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- <script src="{{ asset('css/app.css') }}"></script> --}}
<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="app">
            <router-view></router-view>
            {{-- <example-component></example-component> --}}
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>

</body>

</html>
