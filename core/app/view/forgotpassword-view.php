<!-- Main Content -->
</br>
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-th-large"></i> Recuperación Contraseña
    </div>
    <div class="panel-body ">
      <br>
      <form class="form-horizontal" method="post" id="addproduct" action="admin/index.php?action=recoverypass" role="form">
      <div class="form-group">
          <div class="col-lg-6 control-label">
            <h3>Ingrese la Dirección del correo con el que se registro</h3>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
          <div class="col-md-4">
            <input type="hidden" name="action" value="0">
            <input type="text" name="email" class="form-control" id="email" placeholder="Email" required>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-danger btn-sm-lg"> Confirmar </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<br><br>