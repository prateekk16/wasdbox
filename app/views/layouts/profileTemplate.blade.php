<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" ng-app="wasd"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> WASDbox</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />

    @section('header')
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('css/profile.css') }}
        {{ HTML::style('css/jquery-ui.css') }}
        {{ HTML::style('css/sweetalert2.css') }}
        {{ HTML::style('css/font-awesome.min.css') }}
        {{ HTML::style('css/form-elements.css') }}

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        @show

                <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->


{{ $content }}

<div class="container1">
    @if(Session::has('message'))
        <p class="alert" style="color: rgb(29, 91, 157);">{{ Session::get('message') }}</p>
    @endif
</div>






<script src="js/jquery-1.11.1.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/jquery-ui.js') }}
{{ HTML::script('js/jquery.backstretch.min.js') }}
{{ HTML::script('js/scripts.js') }}
{{ HTML::script('js/pusher.js') }}
{{ HTML::script('js/myPusher.js') }}
{{ HTML::script('js/sweetalert2.min.js') }}



<script>
            $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });
</script>


</body>


</html>