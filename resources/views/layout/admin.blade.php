<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <style>
        .mark{
            padding: 5px;
            background: #f9dd0b87;
        }
    </style>

</head>
<body>
 @yield('content')
 <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
 <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
 <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</body>
</html>