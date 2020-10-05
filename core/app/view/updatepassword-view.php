<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-th-large"></i> Recuperación de Contraseña
        </div>
        <div class="panel-body ">
            <br>
            <form class="form-horizontal" method="post" id="addproduct" action="admin/index.php?action=recoverypass" role="form">
                <div class="form-group">
                    <div class="col-lg-4 control-label">
                        <h3> Por favor ingrese una nueva contraseña</h3>
                    </div>
                </div>
                <input type="hidden" name="action" value="1">
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Nueva Contraseña*</label>
                    <div class="col-md-6">
                        <input type="password" name="contraseña" id="oassword" class="form-control" placeholder="contraseña" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Contraseña*</label>
                    <div class="col-md-6">
                        <input type="password" name="contraseña2"  class="form-control" placeholder="confirmar contraseña" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="checkbox" onclick="typepassword()">
                        <label>Mostrar contraseña</label>
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
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js" type="text/javascript"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">

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
</script>