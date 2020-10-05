<?php $user = UserData::getById($_GET["id"]); ?>

<div class="row">
  <div class="col-md-12">
    <h1>Editar</h1>
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-pencil"></i> Editar Usuario
      </div>
      <div class="panel-body ">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=updateuser" role="form">
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-6">
              <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
            <div class="col-md-6">
              <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" required class="form-control" id="lastname" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
            <div class="col-md-6">
              <input type="text" name="username" value="<?php echo $user->username; ?>" class="form-control" required id="username" placeholder="Nombre de usuario">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre de la tienda*</label>
            <div class="col-md-6">
              <input type="text" name="nameshop" value="<?php echo $user->nameshop; ?>" class="form-control" required id="nameshop" placeholder="Nombre de la tienda">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Esta activo</label>
            <div class="col-md-6">
              <div class="checkbox">
                <label>
                <input type="hidden" name="is_active" id="is_active">
                  <input type="checkbox" onclick="checkbox()" name="chek" id="chek" <?php if ($user->is_active) {
                                                            echo "checked";
                                                          } ?>>
                </label>
              </div>
            </div>
          </div>


          <script>      

                                      function checkbox(){
                                        var isChecked = document. getElementById('chek'). checked;


if(isChecked){
  console.log('chek');
  $('#is_active').val(1);

} else {
  console.log('no check');
  $('#is_active').val(0);
}

                                      }

          </script>

          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
            <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
              <button type="submit" class="btn btn-danger btn-block">Actualizar Usuario</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>