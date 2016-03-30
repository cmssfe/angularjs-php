<?php 
require '../classes/CountryRepository.php';
header('Content-type:application/json');

if(isset($_GET['countryCode']) && is_string($_GET['countryCode'])){
    $states=CountryRepository::getStates($_GET['countryCode']);
    echo json_encode($states);
}

?>