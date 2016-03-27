<?php
$countries=[
    ["name"=>"Austria"],
    ["name"=>"Canada"]
];

$json=json_encode($countries);

var_dump(json_decode($json));

?>