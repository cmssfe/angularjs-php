<?php 
require '../classes/CountryRepository.php';
header('Content-type:application/json');

$countries=CountryRepository::getCountries();
echo json_encode($countries);
?>