<?php

require_once __DIR__ . "/../app/classes/VehicleManager.php"; 

include './views/header.php';

$vehicleManager = new VehicleManager();
$vehicles = $vehicleManager->getVehicles();

?>


<div class="container my-4">
    <h1>Vehicle Listing</h1>
    <a href="./../public/views/add.php" class="btn btn-success mb-4">Add Vehicle</a>
    <div class="row">
        <!-- Loop Go here -->
            <?php
            if(!empty($vehicles)){
                foreach($vehicles as $index => $vehicle){
                    $id = $index;
                    $name = $vehicle['name'];
                    $type = $vehicle['type'];
                    $price = $vehicle['price'];
                    $image_src = $vehicle['image'];
            ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= $image_src ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $name ?></h5> 
                         <p class="card-text">Type: <?= $type ?></p>
                        <p class="card-text">Price: $<?= $price ?></p>
                        <a href="./views/view.php?id=<?= $id ?>" class="btn btn-info">View</a>
                        <a href="./views/edit.php?id=<?= $id ?>" class="btn btn-primary">Edit</a>
                        <a href="./views/delete.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
                        
                    </div>
                </div>
            </div>

            <?php
                }
            }
            ?>
            
        <!-- Loop ends here -->
    </div>
</div>

</body>
</html>
