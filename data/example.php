<?php

namespace Oyindonesia;

require_once dirname(__FILE__) . '/../Oyindonesia.php';

$params = [
  'apikey' => 'api_key_here',
  'username' => 'username_here',
  'production' => false, // set true to use api production
];

Config::Configurations($params);



$result = Accountinquiry::balance();

echo '<pre>';
var_dump($result);
echo '</pre>';