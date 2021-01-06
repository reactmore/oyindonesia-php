<?php

namespace Oyindonesia;

require_once dirname(__FILE__) . '/../Oyindonesia.php';

$params = [
  'apikey' => 'api_key_here',
  'username' => 'username_here',
  'production' => false, // set true to use api production
];

Config::Configurations($params);

$data = [
  "invoice_id" => '285d2e77-f527-4404-9b15-44b90c959376s'
];



$result = Accountinquiry::InvoicesPay($data);

//If the exception is thrown, this text will not be shown
echo '<pre>';
var_dump($result);
echo '</pre>';