<?php
require_once __DIR__ . "/../../app/classes/VehicleManager.php"; 

include './header.php';

$vehicleManager = new VehicleManager();

$id = $_GET['id'];

if($id === null){
    header("Location: ../index.php");
    exit;
}


if($_SERVER["REQUEST_METHOD"] === "POST"){

    $vehicleManager = new VehicleManager("", "", "", "");

    if(isset($_POST)){
        
        $vehicleManager->deleteVehicle($id);
        header("Location: ../index.php");
        exit;
    }

}

?>
<div class="container my-4">
    <h1>Delete Vehicle</h1>
    <p>Are you sure you want to delete <strong></strong>?</p>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit" name="confirm" value="yes" class="btn btn-danger">Yes, Delete</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>