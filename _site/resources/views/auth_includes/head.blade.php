<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! trans('auth.header') !!}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- JQuery 3.3.1 -->
	<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"  type="text/javascript"></script> 
	
	<!-- FA Icons and Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	
	<!-- Bootstrap Default and Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
	
	<!-- Countries Dropdown and Icons -->
	<link href= "{{ URL::asset('css/flag-icon-css/css/flag-icon.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('js/country-dropdown/css/msdropdown/dd.css') }}" rel="stylesheet" type="text/css"/>
	<script src="{{ URL::asset('js/country-dropdown/js/msdropdown/jquery.dd.min.js') }}" type="text/javascript"></script>
	<link href="{{ URL::asset('js/country-dropdown/css/msdropdown/flags.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
	<link rel="stylesheet" href="{{URL::asset('css/floating-labels.css')}}">
	
	<!-- WOW Animation -->
	<link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet" type="text/css"/>
	<script src="{{ URL::asset('wowJS/dist/wow.js') }}" type="text/javascript"></script>
	
	<link href="{{ URL::asset('css/auth.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"/>

	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>