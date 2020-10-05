<!-- Main Content -->

<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-th-large"></i> Recuperación de Contraseña
    </div>
    <div class="panel-body ">
      <br>
      <form class="form-horizontal" method="post" id="addproduct" action="admin/index.php?action=recoverypass" role="form">
        <div class="form-group">
          <div class="col-lg-6">
            <h3> Enviamos un código de confirmación a su correo por favor verifique </h3>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Código de confirmación*</label>
          <div class="col-md-6">
            <input type="hidden" name="action" value="3">
            <input type="text" name="code" class="form-control" id="code" placeholder="Código" required>
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