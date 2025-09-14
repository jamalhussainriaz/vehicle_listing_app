<?php

require_once 'VehicleBase.php';
require_once 'VehicleActions.php';
require_once 'FileHandler.php';

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler;

    public function addVehicle($data) {

        $vehicles = $this->readFile();
        $vehicles [] = $data;
        $this->writeFile($vehicles);
        
    }

    public function editVehicle($id, $data) {
        $vehicles = $this->readFile();
        $vehicles [$id] = $data;
        $this->writeFile($vehicles);
    }

    public function deleteVehicle($id) {

        $vehicles = $this->readFile();
        unset($vehicles[$id]);
        $this->writeFile($vehicles);
        
    }

    public function getVehicles() {
       return $this->readFile();
    }

    // Implement abstract method
    public function viewVehicle($id) {
        $vehicles = $this->readFile();
        return $vehicles[$id];
    }

}
