<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Canvas Print</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://static.filestackapi.com/transforms-ui/beta/transforms.umd.min.js"></script>
<link rel="stylesheet" href="https://static.filestackapi.com/transforms-ui/beta/transforms.css" />
<link href='//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css' rel='stylesheet'>
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
