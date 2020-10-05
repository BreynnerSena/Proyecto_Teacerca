<!-- Main Content -->

</br>
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-th-large"></i>  Registro Tienda
    </div>
    <div class="panel-body ">
      <br>
      <form class="form-horizontal" method="post" id="addproduct" action="admin/index.php?action=adduser" role="form">


        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
          <div class="col-md-6">
            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
          <div class="col-md-6">
            <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre tienda*</label>
          <div class="col-md-6">
            <input type="text" name="nameshop" class="form-control" required id="nameshop" placeholder="Nombre tienda">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Dirección tienda*</label>
          <div class="col-md-6">
            <!--- código nuevo -->
            <div class="form-group row">
              <!--- select ciudad -->
              <div class="col-sm-3">
                <div class="form-inline">
                  <select class="form-control" name="ciudad" required>
                    <option selected>Ciudad</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Barranquilla">Barranquilla</option>
                    <option value="Bogota">Bogotá</option>
                    <option value="Bucaramanga">Bucaramanga</option>
                    <option value="Cali">Cali</option>
                    <option value="Cucuta">Cucuta</option>
                    <option value="Girardot">Girardot</option>
                    <option value="Ibague">Ibague</option>
                    <option value="Itagüi">Itagüi</option>
                    <option value="Manizales">Manizales</option>
                    <option value="Medellin">Medellín</option>
                    <option value="Monteria">Monteria</option>
                    <option value="Neiva">Neiva</option>
                    <option value="Pasto">Pasto</option>
                    <option value="Pereira">Pereira</option>
                    <option value="Santa Marta">Santa Marta</option>
                    <option value="Soacha">Soacha</option>
                    <option value="Tocancipa">Tocancipá</option>
                    <option value="Tunja">Tunja</option>
                    <option value="Valledupar">Valledupar</option>
                    <option value="Villavicencio">Villavicencio</option>
                    <option value="Yumbo">Yumbo</option>
                  </select>
                </div>
              </div>
              <!-- select localidad -->
              <div class="col-sm-3">
                <div class="form-inline">
                  <select class="form-control" id="inlineFormCustomSelectPref" name="calle" required>
                    <option value="Calle">Calle</option>
                    <option value="Carrera">Carrera</option>
                    <option value="Avenida">Avenida</option>
                    <option value="Avenida Carrera">Avenida Carrera</option>
                    <option value="Avenida Calle">Avenida Calle</option>
                    <option value="Circular">Circular</option>
                    <option value="Circunvalar">Circunvalar</option>
                    <option value="Diagonal">Diagonal</option>
                    <option value="Manzana">Manzana</option>
                    <option value="Transversal">Transversal</option>
                    <option value="Vía">Vía</option>
                  </select>
                </div>
              </div>
              <!-- select numero uno -->
              <div class="col-sm-2">
                <input class="form-control" placeholder="Num1" name="numerouno" required>

              </div>
              <div class="col-sm-2">
                <input class="form-control" placeholder="# Num2" name="numerodos" required>
              </div>
              <div class="col-sm-2">
                <input class="form-control" placeholder="- Num3" name="numerotres" required>

              </div>

              <!----->
            </div>
            <!--- fin de cod nuevo -->
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
          <div class="col-md-6">
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>

        <input type="hidden" name="opcion" value="1">

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
          <div class="col-md-6">
            <input type="password" required name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-danger btn-sm-lg"> Agregar Tienda </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>