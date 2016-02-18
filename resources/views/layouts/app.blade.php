<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>@yield('title', 'Inicio') | Sistema Notas</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('plugin/chosen/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/trumbowyg/ui/trumbowyg.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing-page.css')}}">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container topnav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i>&nbsp; Sistema Notas</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::guest())
                      <li class="dropdown">
                        <a href="##" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{route('admin.alumnos.index')}}"><i class="fa fa-user fa-fw"></i> Alumnos</a></li>
                          <li><a href="{{route('admin.profesores.index')}}"><i class="fa fa-user fa-fw"></i> Profesores</a></li>
                          <li><a href="{{route('admin.materias.index')}}"><i class="fa fa-book fa-fw"></i> Materias</a></li>
                          <li><a href="{{route('admin.usuarios.index')}}"><i class="fa fa-users"></i> Usuarios</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{route('admin.notas.index')}}"><i class="fa fa-plus"></i>  Ingresar Notas</a></li>
                          <li><a href="{{url('notas/consultar')}}"><i class="fa fa-archive"></i>  Consultar Notas</a></li>
                        </ul>
                      </li>
                      <li><a href="{{url('materias/elegir')}}">Elegir Materias</a></li>
                      <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                      @else
                      <li><a href="{{url('materias/elegir')}}">Elegir Materias</a></li>
                      <li><a href="{{url('notas/consultar')}}">Consultas</a></li>
                      <li><a href="{{ url('/login') }}">Iniciar  Sesión</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>   
        @include('flash::message')       
        @yield('content')
        {!!Html::script('js/jquery.js')!!}
         {!!Html::script('js/consultas.js')!!}
         {!!Html::script('js/ajax-chosen.js')!!}
    <footer>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <p class="navbar-text">Todos Los Derechos Reservados &copy {{date('Y')}}</p>
                    <p class="navbar-text navbar-right">Facci - Quinto "A"</p>
                </div>
            </div>
        </nav>
    </footer>

    <!-- JavaScripts -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="{{ asset('plugin/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('plugin/trumbowyg/trumbowyg.js') }}"></script>
     

    @yield('js')
</body>
</html>
