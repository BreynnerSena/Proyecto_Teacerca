<?php
$product = SlideData::getById($_GET["slide_id"]);
$url = "storage/slides/$product->image";
?>
<!-- Main Content -->

<div class="row">
  <div class="col-md-12">
  <h1>Editar</h1>
    <?php
    // print_r($_SESSION);
    if (isset($_SESSION["product_updated"])) : ?>
      <p class="alert alert-info"><i class="fa fa-check"></i> Slider Actualizado Exitosamente</p>
    <?php
      unset($_SESSION["product_updated"]);
    endif; ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-pencil"></i> Editar Slider
      </div>
      <div class="panel-body ">

        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="index.php?action=updateslide">
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Título</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="title" value="<?php echo $product->title; ?>" placeholder="Titulo">
            </div>
          </div>
          <img src="<?php echo $url; ?>" class="img-responsive">
          <br>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Imagen</label>
            <div class="col-lg-10">
              <input type="file" name="image">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-3">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="is_public" <?php if ($product->is_public) {
                                                            echo "checked";
                                                          } ?>> Es Visible
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
              <button type="reset" class="btn btn-info btn-block">Limpiar Campos</button>
            </div>
            <div class="col-lg-4">
              <button type="submit" class="btn btn-danger btn-block">Actualizar Slider</button>

            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $_GET["slide_id"]; ?>">
        </form>
      </div>
    </div>
  </div>
</div>