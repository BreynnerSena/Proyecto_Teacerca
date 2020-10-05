        <!-- Main Content -->

        <?php if ($_SESSION['admin_id'] == 1) { ?>
          <div class="row">
            <div class="col-md-12">
              <!-- Button trigger modal -->

              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-l abelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-h idden="true">&times;</button>
                      <h4 class="modal-title">Nueva Categoría</h4>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" role="form" method="post" action="index.php   ?action=addcategory">
                        <div class="form-group">
                          <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
                          <div class="col-lg-10">
                            <input type="text" required class="form-control" name="name" placeholder="Nombre de la categoría">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail1" class="col-lg-2 control-label">Nombre Corto</label>
                          <div class="col-lg-10">
                            <input type="text" required class="form-control" name="short_name" placeholder="Nombre corto">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="is_active"> Categoría Activa
                              </label>
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-block btn btn-danger">Agregar Categoría</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

              <div class="row">
                <div class="col-md-12">
                  <!-- Button trigger modal -->
                  <h2>Lista de Categorías</h2>
                  <a data-toggle="modal" href="#myModal" class="btn btn-danger">Agregar Categoría</a>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="fa fa-th-list"></i> Categorías
                    </div>
                    <div class="widget-body medium no-padding">
                      <?php
                      $categories = CategoryData::getAll();
                      if (count($categories) > 0) : ?>
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>

                              <th>Nombre</th>
                              <th>Activo</th>
                              <th>Acciones</th>
                            </thead>
                            <tbody>

                              <?php foreach ($categories as $cat) : ?>
                                <tr>
                                  <td><?php echo $cat->name; ?>
                                  <td style="width:30px;"><?php if ($cat->is_active) : ?><center><i class="fa fa-check"></i></center><?php endif; ?></td>
                                  <td style="width:10px;">
                                    <a href="../?view=posts&cat=<?php echo $cat->short_name; ?>" target="_blank" class="btn btn-secondary btn-xs"><i class="fa fa-eye"></i></a>
                                  </td>
                                  </td>
                                  <td style="width:70px;">
                                    <a data-toggle="modal" href="#myModal-<?php echo $cat->id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                                    <!-- Button trigger modal -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal-<?php echo $cat->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Editar Categoría</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form class="form-horizontal" role="form" method="post" action="index.php?action=updatecategory">
                                              <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
                                                <div class="col-lg-10">
                                                  <input type="text" required class="form-control" name="name" value="<?php echo $cat->name; ?>" placeholder="Nombre de la categoría">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-2 control-label">Nombre Corto</label>
                                                <div class="col-lg-10">
                                                  <input type="text" required class="form-control" value="<?php echo $cat->short_name; ?>" name="short_name" placeholder="Nombre corto">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                  <div class="checkbox">
                                                    <label>
                                                      <input type="checkbox" name="is_active" <?php if ($cat->is_active) {
                                                                                                echo "checked";
                                                                                              } ?>> Categoría Activa
                                                    </label>
                                                  </div>
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                  <input type="hidden" name="category_id" value="<?php echo $cat->id; ?>">
                                                  <button type="submit" class="btn btn-block btn-danger">Actualizar Categoría</button>
                                                </div>
                                              </div>
                                            </form>
                                          </div>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                    <a href="index.php?action=delcategory&category_id=<?php echo $cat->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>

            <?php } else {
            print "<script>window.location='index.php?view=posts';</script>";
          }   ?>