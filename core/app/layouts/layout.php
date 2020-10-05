<?php
$title = ConfigurationData::getByPreffix("general_main_title")->val;

?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Teacerca - Sistema de Catálogo en Linea</title>

  <link rel="stylesheet" type="text/css" href="res/lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="res/lib/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="res/btn-label.css">
  <script src="res/lib/jquery/jquery.min.js"></script>
  <script src="res/bootstrap-rating.min.js"></script>

</head>

<body>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-xs-5">
          <br>
          <div class="login-logo">
            <img src="Teacerca1.png"></b>
          </div>
        </div>
        <div class="col-md-7 col-xs-5">
          <br><br>
          <form class="form-horizontal" role="form">
            <div class="input-group">
              <input type="hidden" name="view" value="posts">
              <input type="hidden" name="act" value="search">
              <input type="text" name="q" placeholder="Buscar producto..." class="form-control">
              <span class="input-group-btn">
                <button type="button" class="btn btn-danger">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
              </span>
            </div><!-- /input-group -->
          </form>
          <br><br>
        </div>
        <div class="col-md-2 col-xs-2">
          <!-- cart button -->
          <br><br>
        </div>
      </div>
    </div>
  </section>
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Navegación</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li><a href="./"><i class="fa fa-home"></i> Inicio</a></li>
          <?php
          $cats = CategoryData::getPublics();
          ?>
          <?php if (count($cats) > 0) : ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-list"></i> Categorías<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php foreach ($cats as $cat) : ?>
                  <li><a href="index.php?view=posts&cat=<?php echo $cat->short_name; ?>"><?php echo $cat->name; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php endif; ?>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp; <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="admin/index.php">Iniciar Sesión</a></li>
              <li><a href="index.php?view=register">Registrarse</a></li>
            </ul>
          </li>
        </ul>

      </div>
      </.navbar-collapse -->
    </div>
  </nav>
  <?php View::load("index"); ?>

  <br><br><br>
  <section>
    <div class="container">

      <!-- - - - -->
      <div class="row">
        <div class="col-md-12">
          <hr>
          <p><b>Teacerca</b> 2020</p>
          <ul class="list-inline">
            <li>
              <p class="text-muted">Teacerc4@gmail.com</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <br>
  <script src="res/lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(".tip").tooltip();
  </script>

</body>

</html>