<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Teacerca | PanelDeControl</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.4 -->
  <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <link href="plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css" />
  <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
  <script src="plugins/morris/raphael-min.js"></script>
  <script src="plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/morris/example.css">

  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link href='plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
  <link href='plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
  <script src='plugins/fullcalendar/moment.min.js'></script>
  <script src='plugins/fullcalendar/fullcalendar.min.js'></script>
  <script src="../res/bootstrap-rating.min.js"></script>

</head>

<body  onpaste="return false" class="<?php if (isset($_SESSION["admin_id"]) || isset($_SESSION["pacient_id"]) || isset($_SESSION["medic_id"])) : ?>  skin-blue-light sidebar-mini <?php else : ?>login-page<?php endif; ?>">
  <div class="wrapper">
    <!-- Main Header -->
    <?php if (isset($_SESSION["admin_id"]) || isset($_SESSION["pacient_id"]) || isset($_SESSION["medic_id"])) : ?>
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><img src="Teacerca3.png"></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><img src="Teacerca2.png"></b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class=""><?php
                                  if (isset($_SESSION["admin_id"])) {
                                    echo UserData::getById($_SESSION["admin_id"])->name;
                                  }
                                  ?></span>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="./logout.php" class="btn btn-danger btn-sm-lg"> Salir </a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">ADMINISTRACIÓN</li>
            <?php if (isset($_SESSION["admin_id"])) : ?>

              <?php $u = UserData::getById($_SESSION["admin_id"]); ?>
              <li><a href="./"><i class='fa fa-dashboard'></i> <span>Inicio</span></a></li>

              <li class="treeview">
                <a href="#"><i class="fa fa-folder"></i><span>Catálogos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                  <li><a href="./?view=posts"><i class="fa fa-circle-o"></i> Productos</a></li>
                  <?php if ($u->is_admin) : ?>
                  <li><a href="./?view=categories"><i class="fa fa-circle-o"></i> Categorías</a></li>
                   <?php endif; ?>
                </ul>
              </li>
              <?php if ($u->is_admin) : ?>
              <li><a href="./?view=slider"><i class='fa fa-th-large'></i> <span>Slider</span></a></li>
              <?php endif; ?>
              <?php if ($u->is_admin) : ?>
                <li><a href="./?view=settings"><i class='fa fa-wrench'></i> <span>Ajustes</span></a></li>
                <li><a href="./?view=users"><i class='fa fa-user'></i> <span>Usuarios</span></a></li>
              <?php endif; ?>
            <?php endif; ?>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif; ?>

    <!-- Content Wrapper. Contains page content -->
    <?php if (isset($_SESSION["admin_id"])) : ?>
      <div class="content-wrapper">
        <section class="content">
          <?php View::load("index"); ?>
        </section>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <strong>Teacerca &copy; 2020</strong>
      </footer>
    <?php else : ?>
      <div class="login-box">
        <div class="login-box-body">
          <form action="./?action=processlogin" method="post">
            <!-- /.login-logo -->
            <div class="login-logo">
            <a><b><img src="Teacerca1.png"></b></a>
            </div>
            <div class="form-group has-feedback">
              <input type="text" name="username" required class="form-control" placeholder="Usuario" />
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="password" id="oassword" required class="form-control" placeholder="Password" />
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group">
              <input type="checkbox" onclick="typepassword()">
              <label>Mostrar contraseña</label>
            </div>
            <div class="form-group">
              <a href="../index.php?view=forgotpassword">¿Olvido su contraseña?</a>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <button type="submit" class="btn btn-danger btn-block btn-flat">Acceder</button>
              </div><!-- /.col -->
            </div>
          </form>
        </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->

    <?php endif; ?>


  </div><!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 2.1.4 -->
  <!-- Bootstrap 3.3.2 JS -->
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="plugins/dist/js/app.min.js" type="text/javascript"></script>
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">

    
    
    window.onload = function() {
      var myInput = document.getElementById('bloquear');
      myInput.onpaste = function(e) {
        e.preventDefault();
        alert("esta acción está prohibida");
      }

      myInput.oncopy = function(e) {
        e.preventDefault();
        alert("esta acción está prohibida");
      }
    }

    function typepassword() {

      var tipo = document.getElementById("oassword");
      if (tipo.type === "password") {
        tipo.type = "text";
        //$('#eye').text('Ocultar');
    } else {
        tipo.type = "password";
        //$('#eye').text('Ver contraseña');
    }



    }



    $(document).ready(function() {
      $(".datatable").DataTable({
        "language": {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }
      });
    });
  </script>

</body>

</html>