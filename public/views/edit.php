<?php
require_once __DIR__ . "/../../app/classes/VehicleManager.php"; 

include './header.php';

$vehicleManager = new VehicleManager("", "", "", "");

$id = $_GET['id'];

if($id === null){
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id]?? null;

if(!$vehicle){
    header("Location: ../index.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $vehicleManager = new VehicleManager("", "", "", "");

    if(isset($_POST)){
        $data = [
            "name" => $_POST['name'],
            "type" => $_POST['type'],
            "price" => $_POST['price'],
            "image" => $_POST['image'],
        ];

        $id = $_POST['id'];
        $vehicleManager->editVehicle($id, $data);
        header("Location: ../index.php");
        exit;
    }

}


?>


<div class="container my-4">
    <h1>Edit Vehicle</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Vehicle Name</label>
            <input type="text" name="name" class="form-control" value="<?= $vehicle['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vehicle Type</label>
            <input type="text" name="type" class="form-control" value="<?= $vehicle['type'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="<?= $vehicle['price'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" value="<?= $vehicle['image'] ?>" required>
        </div>
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit" class="btn btn-primary">Update Vehicle</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>