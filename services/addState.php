<?php  
require '../classes/CountryRepository.php';

header('Content-type:application/json');

echo ")]}'\n";

if(isset($_GET['name'])&&is_string($_GET['name']) && isset($_GET['countryCode']) && 
is_string($_GET['countryCode'])){
    CountryRepository::addState($_GET['name'],$_GET['countryCode']);
    echo json_encode(true);
}
?>