<?php
namespace DesignPattern\DecoratorPattern;

interface CarService
{
    public function getCost();
    public function getDescription();
}

class BaseCarService implements CarService
{
    public function getCost()
    {
        return 20;
    }

    public function getDescription()
    {
        return "base class description";
    }
}

class OilChange implements CarService
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 10 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return "oil change car service" ." and ". $this->carService->getDescription();
    }
}

class TireRotation implements CarService
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 5 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return "tire change car service" ." and ". $this->carService->getDescription();
    }
}

//$object = new BaseCarService();
//$object = new OilChange(new BaseCarService());
$object = new TireRotation(new OilChange(new BaseCarService()));
echo $object->getDescription()."\n";
echo $object->getCost()."\n";