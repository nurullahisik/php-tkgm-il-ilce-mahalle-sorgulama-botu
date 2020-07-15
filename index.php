<?php


require __DIR__ . "/vendor/autoload.php";

use TKGM\Adres\AddressProperties;
use TKGM\Adres\AddressInitialize;


$object = new AddressInitialize();

$properties = new AddressProperties();
$properties->setCity("Mardin");
$properties->setDistrict("Ömerli");
$properties->setNeighborhood("");
$properties->setUnit("");

$result = $object->create($properties);

print_r($result["data"]);