<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>AdminLTE 2 | Top Navigation</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    {!! Html::style('assets/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}
    {!! Html::style('assets/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('assets/dist/css/skins/_all-skins.min.css') !!}

    {!! Html::script('assets/plugins/jQuery/jquery-2.2.3.min.js') !!}

    @yield('styles')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'baseUrl' => url('/'),
        ]) !!};
    </script>

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    @include('elements.header.header')
    <div class="content-wrapper">
        <div class="container">
            @include('elements.content.header')
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>
    @include('elements.footer.footer')
</div>

@yield('scripts')

{!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/plugins/fastclick/fastclick.js') !!}
{!! Html::script('assets/dist/js/app.min.js') !!}

</body>
</html>
