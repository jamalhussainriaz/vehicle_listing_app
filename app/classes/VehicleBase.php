<?php

abstract class VehicleBase {
    
    protected $name;
    protected $type;
    protected $price;
    protected $image;

    public function __construct($name, $type, $price, $image)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->image = $image;

    }

    abstract function viewVehicle($id);
    
    Public function anotherMethod(){
        return "Hi";
    }

}
