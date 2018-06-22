@extends('layouts.app')

@section('content')

<link href="{{asset('/css/homepage.css')}}" rel="stylesheet" />

<link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

<body>

<div id="navbar-full">
    <div class="container">
        <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="logo-container">
                                <div class="logo"><img src="{{asset('images/Miguefie.jpg')}}"/></div>
                                <div class="brand">{{ Session::get('name')}}</div>
                            </div>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#myModal">Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>

                @if( Session::get('nivelAcesso') == 1)
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('gestao') }}/">Administração</a></li>
                        </ul>

                    </div>
                @endif
            </div>
        </nav>
    </div>

    <div class='blurred-container'>

        <div class="img-src" style="background-image: url('{{asset('images/background.jpeg')}}')"></div>
        <div class='img-src blur' style="background-image: url('{{asset('images/background-blur.jpg')}}')"></div>
    </div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Alterar Perfil</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="editarPerfil.php" enctype="multipart/form-data">
                        <div class="col-sm-4">
                            <img src="" alt="Circle Image" class="img-circle">
                        </div>
                        <div class="col-sm-8">
                            <label style="color:#aaa; font-weight:normal;" class="">Foto <small>w: 80, h: 80; não insira foto para manter a atual.</small></label>
                            <input type="file" name="inserir_foto" id="inserir_foto" value="">
                        </div>

                </div>
                <br>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" value="{{ Session::get('name')}}" class="form-control"></input>
                        <br>
                        <label>Username</label>
                        <input type="text" name="username" value="{{ Session::get('username')}}" class="form-control"></input>
                        <br>
                        <label>Password</label>
                        <input type="password" name="password" value="{{ Session::get('password')}}" class="form-control"></input>
                        <br>
                        <label>Email</label>
                        <input type="text" name="email" value="{{ Session::get('email')}}" class="form-control"></input>
                        <br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Fechar</button>
                <div class="divider"></div>
                <button type="submit" class="btn btn-info btn-simple">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="main">
    <div class="container tim-container">
        <div id="extras">
            <div class="space"></div>
            <div class="row">
                <div class="col-md-7 col-md-offset-0 col-sm-10 col-sm-offset-1">
                    <div class="text-center">
                        <img src="images/img02.jpeg" alt="Rounded Image" class="img-rounded img-responsive img-dog">
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <h1 class="text-center">
                        Projeto de Redes
                        <small class="subtitle">Descrição</small></h1>
                    <hr>
                    <p>
                        Este projeto consiste na Administração de Coloboradores e os seus horários
                    </p>
                    <p>

                    </p>
                    <p>
                        Trabalho Realizado Por: Miguel Fialho Nº13 3ºTSI
                    </p>

                </div>
            </div>
        </div>
        <!--     end extras -->
    </div>
    <!-- end container -->
    <div class="space-30"></div>
</div>

</body>


<script src="{{asset('/js/homepage.js')}}"></script>



<script type="text/javascript">

    $('.btn-tooltip').tooltip();
    $('.label-tooltip').tooltip();
    $('.pick-class-label').click(function(){
        var new_class = $(this).attr('new-class');
        var old_class = $('#display-buttons').attr('data-class');
        var display_div = $('#display-buttons');
        if(display_div.length) {
            var display_buttons = display_div.find('.btn');
            display_buttons.removeClass(old_class);
            display_buttons.addClass(new_class);
            display_div.attr('data-class', new_class);
        }
    });



</script>
@endsection