<?php

namespace Oyindonesia;

require_once dirname(__FILE__) . '/../Oyindonesia.php';

$params = [
    'apikey' => '34f24acc-0b00-4f49-b15a-7ff78385e28e',
    'username' => 'reactmore',
    'production' => true,
];

Config::Configurations($params);



$result = Accountinquiry::balance();

echo '<pre>';
var_dump($result);
echo '</pre>';
