<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/')}}css/main.css"/>

    <link rel="stylesheet" href="{{asset('/')}}assets/css/normalize.css">
    <link rel="stylesheet" href="{{asset('/')}}ssets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/css/cs-skin-elastic.css">
    <link rel="shortcut icon" href="{{asset('/')}}images/shortcutIcon/shortcutIcon.jpg"/>
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('/')}}assets/scss/style.css">
    <link href="{{asset('/')}}assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">



        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Admin panel </a>
                </li>
                <h3 class="menu-title">Tables</h3><!-- /.menu-title -->
                <li class="active">
                    <a href="{{route('adminPages')}}"> <i class="menu-icon fa fa-dashboard"></i>Pages </a>
                </li>
                <li class="active">
                    <a href="{{route('adminSlider')}}"> <i class="menu-icon fa fa-dashboard"></i>Slider </a>
                </li>
                <li class="active">
                    <a href="{{route('adminGallery')}}"> <i class="menu-icon fa fa-dashboard"></i>Gallery </a>
                </li>
                <li class="active">
                    <a href="{{route('admin')}}"> <i class="menu-icon fa fa-dashboard"></i>Users </a>
                </li>
                <li class="active">
                    <a href="{{route('adminProduct')}}"> <i class="menu-icon fa fa-dashboard"></i>Products </a>
                </li>
                <li class="active">
                    <a href="{{route('adminPoll')}}"> <i class="menu-icon fa fa-dashboard"></i>Polls </a>
                </li>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('logout')}}">Logout</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    @yield('adminContent')



</div><!-- /#right-panel -->

<!-- Right Panel -->
@section('adminJavaScript')
<script>
    const websiteRoot = '{{ route("home") }}';
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
    ( function ( $ ) {
        "use strict";
        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>
@show
</body>
</html>