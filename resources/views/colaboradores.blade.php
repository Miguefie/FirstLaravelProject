
@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/bower_components/morris.js/morris.css')}}">

    <link rel="stylesheet" href="{{asset('admin/bower_components/jvectormap/jquery-jvectormap.css')}}">

    <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style>
    div.slider {
        display: none;
    }
</style>

<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Session::get('name') }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../" class="img-circle" alt="User Image">
                                <p>
                                    {{ Session::get('name') }}
                                    <small>{{ Session::get('email') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="../sucesso.php" class="btn btn-default btn-flat">Home</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../logout.php" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">

        <section class="sidebar">

            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Session::get('name') }}</p>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Gestão</li>
                <li class="active">
                    <a href="colaboradores.php">
                        <i class="fa fa-user"></i> <span>Colaboradores</span>
                    </a>
                </li>
                <li>
                    <a href="lojas.php">
                        <i class="fa fa-shopping-bag"></i> <span>Lojas</span>
                    </a>
                </li>
                <li>
                    <a href="horarios.php">
                        <i class="fa fa-clock-o"></i> <span>Horários</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Colaboradores
                <small>Lista dos Colaboradores</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Colaboradores</li>
            </ol>
        </section>


        <section class="content">
            <div class="box">
                <div class="box-header">
                    <div class="btn-group">
                        <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#myModal">Inserir Colaborador</button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="products" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><a>Nome Colaboradores</a></th>
                            <th><a>NIF</a></th>
                            <th><a>Telefone</a></th>
                            <th><a>Email</a></th>
                            <th><a></a></th>
                        </tr>
                        </thead>

                        <tbody class="product-index">
                        <tr>
                            @if(!empty($colabs))
                            @foreach($colabs as $colaborador)
                            <td>{{ $colaborador->nome }}</td>
                            <td>{{ $colaborador->nif  }}</td>
                            <td>{{ $colaborador->telefone }}</td>
                            <td>{{ $colaborador->email }}</td>

                            <td>
                                <a class="btn btn-block btn-success" href="#editar" data-toggle="modal">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                                <a href="#delete" data-toggle="modal">
                                    <button type="button" class="btn btn-block btn-danger"> <i class="fa fa-fw fa-trash"></i> </button>
                                </a>

                            </td>

                            <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Inserir Colaborador</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="colaboradores_editar.php" enctype="multipart/form-data">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>Nome Colaboradores</label>
                                                        <input type="text" name="nome" value="" class="form-control" required></input>
                                                        <br>
                                                        <label>NIF</label>
                                                        <input type="number" name="nif" value="" class="form-control" required></input>
                                                        <br>
                                                        <label>Telefone</label>
                                                        <input type="text" name="telefone" value="" class="form-control" required></input>
                                                        <br>
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="" class="form-control" required></input>
                                                        <br>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-success btn-simple">Alterar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div id="delete" class="modal fade"  role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Eliminar Colaborador</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="colaboradores_apaga.php" enctype="multipart/form-data">
                                                <label> Tem a Certeza Que Quer Eliminar o Colaborador:  </label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Fechar</button>
                                            <a type="submit" href="colaboradores_apaga.php" class="btn btn-danger btn-simple">Eliminar</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </tr>
                             @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Inserir Colaborador</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('colaboradores') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Nome Colaboradores</label>
                                        <input type="text" name="nome" value="" class="form-control" required></input>
                                        <br>
                                        <label>NIF</label>
                                        <input type="number" name="nif" value="" class="form-control" required></input>
                                        <br>
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" value="" class="form-control" required></input>
                                        <br>
                                        <label>Email</label>
                                        <input type="email" name="email" value="" class="form-control" required></input>
                                        <br>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-info btn-simple">Inserir Colaborador</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>

    <footer class="main-footer">
        <strong>Trabalho Realizado Por: Miguel Fialho Nº13</strong>
    </footer>

    <!-- jQuery 3 -->
    <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('admin/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/morris.js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->

    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <!-- Slimscroll -->
    <script src="{{asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
    <script>
        //miss table reference
        var table = $('#products').DataTable({
            "lengthMenu": [[20, 50, 100, 500, -1], [20, 50, 100, 500, "All"]],
            "columnDefs": [{ className: "details-control", "targets": [ 0 ] }]
        });

    </script>
</body>
@endsection
