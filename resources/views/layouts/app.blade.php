<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Emergency Records</title>
    <link href="//cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/form.authy.min.css" media="screen" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500' rel='stylesheet' type='text/css'>
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>--}}

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {

            background-color:#eceff1;
        }
        body,label{
            font-family: 'Ubuntu', sans-serif;
        }
        nav.navbar{
            background-color: white;
            padding-bottom: 0px;
            margin-bottom: 0;
        }
        a.navbar-brand{
            color: #54b14f;
        }
        .panel > .panel-heading {
            background-image: none;
            background-color: #fafbfc;
            color: #54b14f;
        }
        button.btn-default{
            background: #5f5f5f;
            color: #eceff1;
        }
        table th{
            background: #cfd8dc;
        }

        #grad {

        }

        hr.style-one {
            margin: 0;
            padding: 0;
            border: 0;
            height: 4px;
            background: #54b14f;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .datepicker{z-index:1151 !important;}
    </style>
    {{--{{ HTML::style('css/custom.css') }}--}}

</head>
<body id="app-layout" >

    @include('layouts.navbar')


    <div class="container">
        @include('includes.message-block')
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/form.authy.min.js" type="text/javascript"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
