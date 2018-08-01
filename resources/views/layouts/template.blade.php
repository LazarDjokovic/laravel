<!DOCTYPE html>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
            <meta charset="utf-8">
            <title>ZolaTrade</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            <link rel="stylesheet" href="{{asset('/')}}css/main.css"/>
            <link rel="shortcut icon" href="{{asset('/')}}images/shortcutIcon/shortcutIcon.jpg"/>
            <link rel="stylesheet" href="{{asset('/')}}css/lightbox.min.css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    </head>
    <body @if(session()->has('user')) onload="numberOfOrders({{session('user')[0]->user_id}}) @endif">

            @empty(!session('error'))
                <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endempty
            @empty(!session('successLogin'))
                <div class="alert alert-success" style="text-align: center">{{ session('successLogin') }} </div>
            @endempty


        @include('components.navigation')
                
        @yield('content')
        <script>
            const websiteRoot = '{{ route("home") }}';
            const token = '{{ csrf_token() }}';
            //console.log(token);

            $(document).ready(function() {
                var docHeight = $(window).height(); //screen size
                var footerHeight = $('#footer').height(); //footer size
                var footerTop = $('#footer').position().top + footerHeight;

                if (footerTop < docHeight) {
                    $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
                }
            });
        </script>
        @include('components.footer')

        @section('js')
        <script src="{{asset('/')}}js/lightbox-plus-jquery.min.js"></script>
        @show
        <script>
            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 5000);
        </script>
    </body>


