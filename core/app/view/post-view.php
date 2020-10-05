<?php
$p = PostData::getById($_GET["product_id"]);
$direccion =  PostData::getAddrees($_GET["product_id"]);

$localidad = "Bogota";
$Calles = "Carrera";
$numerouno = "95a";
$numerodos = "129d";
$numero3 = "36";


$latitud;
$longitud;
$address = urlencode($direccion->address);
$googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBcThllYK4h_5A6qPw-z4iFinePf3GRVQc";
$geocodeResponseData = file_get_contents($googleMapUrl);
$responseData = json_decode($geocodeResponseData, true);
if ($responseData['status'] == 'OK') {
  $latitude = $responseData['results'][0]['geometry']['location']['lat'];
  $longitude = $responseData['results'][0]['geometry']['location']['lng'];
  $formattedAddress = isset($responseData['results'][0]['formatted_address']) ? $responseData['results'][0]['formatted_address'] : "";
  if ($latitude && $longitude && $formattedAddress) {
    $geocodeData = array();
    array_push(
      $geocodeData,
      $latitude,
      $longitude,
      $formattedAddress
    );

    $latitud = $latitude;
    $longitud = $longitude;
    // return $geocodeData;             
  } else {
    return false;
  }
} else {
  echo "ERROR: {$responseData['status']}";
  return false;
}


include 'mapa.php';
?>


<div class="container">

  <div class="col-lg-12 mb-4">

  </div>
  <div class="row">
    <div class="col-md-3">
      <!-- div categorías -->
      <h3>Categorías</h3>
      <?php
      $cats = CategoryData::getPublics();
      ?>
      <?php if (count($cats) > 0) : ?>
        <div class="list-group">
          <?php foreach ($cats as $cat) : ?>
            <a href="index.php?view=posts&cat=<?php echo $cat->short_name; ?>" class="list-group-item"><i class="fa fa-chevron-right"></i> <?php echo $cat->name; ?></a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-md-9 mb-2">
      <h3 class="entry-title"><span><?php echo $p->name; ?></span></h3>
      <div class="breadcrumb">
        <span></span>
        <a href="./">Inicio</a>
        <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
        <span class="current"><?php echo $p->name; ?></span>
      </div>
      <?php if ($p != null) :
        $img = "admin/storage/products/" . $p->image;
        if ($p->image == "") {
          $img = $img_default;
        }
      ?>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="row no-gutters">
                <div class="col-sm-6 col-md-12" style="margin-left: 2%;">
                  <img src="<?php echo $img; ?>" class="img-responsive" style="width: 50%;">
                </div>
                <div class="col-6 col-md-4" style="margin-left: -45%;margin-top: 10%;">
                  <h3><?php echo $p->name; ?></h3>
                  <h4>Precio: <?php echo $p->preciopost; ?></h4>
                  <h5>Descripción: <?php echo $p->description; ?></h5>
                  <h5>Marca:<?php echo $p->marca; ?></h5>
                  <h5>Código: <?php echo $p->code; ?></h5>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                    Ver ubicación
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr>
          <?php endif; ?>
          </div>
        </div>
    </div>
  </div>