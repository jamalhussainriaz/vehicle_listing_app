<?php
include './header.php';
require_once __DIR__ . "/../../app/classes/VehicleManager.php"; 

//include './views/header.php';

$id = $_GET['id'];

if($id === null){
    header("Location: ../index.php");
    exit;
}

$vehicleManager = new VehicleManager();
$vehicle = $vehicleManager->viewVehicle($id);
//$vehicle = $vehicleManager->getDetails();


if(!$vehicle){
    header("Location: ../index.php");
    exit;
}

$name = $vehicle['name']?? null;
$type = $vehicle['type']?? null;
$price = $vehicle['price']?? null;
$image_src = $vehicle['image']?? null;

// echo '<pre>';
// print_r($vehicle);
// exit;
?>


<div class="container my-4">
    <h1>View Vehicle</h1>
    <a href="../index.php" class="btn btn-warning">BACK</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <img src="<?= $image_src ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $name ?></h5> 
                    <p class="card-text">Type: <?= $type ?></p>
                    <p class="card-text">Price: $<?= $price ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
