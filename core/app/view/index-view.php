<?php
$cnt = 0;
$slides = SlideData::getPublics();
$featureds = PostData::getFeatureds();
?>
<section>
  <div class="container">

    <div class="row">

      <div class="col-md-12">
        <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
        <?php if (count($slides) > 0) : ?>

          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php foreach ($slides as $s) : ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $cnt; ?>" class="<?php if ($cnt == 0) {
                                                                                                          echo "active";
                                                                                                        } ?>"></li>
              <?php $cnt++;
              endforeach; ?>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <?php $cnt = 0;
              foreach ($slides as $s) :
                $url = "admin/storage/slides/" . $s->image;
              ?>

                <div class="item <?php if ($cnt == 0) {
                                    echo "active";
                                  } ?>">
                  <img src="<?php echo $url; ?>" alt="...">
                  <div class="carousel-caption">
                    <h2><?php echo $s->title; ?></h2>
                  </div>
                </div>
              <?php $cnt++;
              endforeach; ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
        <?php endif; ?>
        <br>
        <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
        <?php

        $nproducts = count($featureds);
        $filas = $nproducts / 3;
        $extra = $nproducts % 3;
        if ($filas > 1 && $extra > 0) {
          $filas++;
        }
        $n = 0;
        ?>
        <?php if (count($featureds) > 0) : ?>
          <a>
            <div style="background:grey;font-size:30px;color:black;padding:7px;"> Productos Destacados </div>
          </a>
          <br>
          <?php for ($i = 0; $i < $filas; $i++) : ?>
            <div class="row">
              <?php for ($j = 0; $j < 3; $j++) :
                $p = null;
                if ($n < $nproducts) {
                  $p = $featureds[$n];
                }
              ?>
                <?php if ($p != null) :
                  $img = "admin/storage/products/" . $p->image;
                  if ($p->image == "") {
                    $img = $img_default;
                  }
                ?>
                  <div class="col-md-4">
                        <center> <img src="<?php echo $img; ?>" style="width:120px;height:130px;"></center>
                        <h4 class="text-center"><?php echo $p->name; ?></h4>
                        <?php
                        $in_cart = false;

                        ?>
                        <center>
                          <a href="index.php?view=post&product_id=<?php echo $p->id; ?>" class="btn btn-info  btn-sm"> Detalles </a>
                        </center>
                      </div>
              
                
                <?php endif; ?>
              <?php $n++;
              endfor; ?>
            </div>
          <?php endfor; ?>
        <?php else : ?>
          <div class="jumbotron">
            <h2>No hay publicaciones destacados.</h2>
            <p> En la pagina principal solo se muestran publicaciones marcados como destacados.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>