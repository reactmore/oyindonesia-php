<?php

namespace Oyindonesia;

// Use this API to get beneficiary account details.

class Accountinquiry
{
  //Get Account Balance

  public static function balance() {

    return ApiRequestor::get(
      Config::getBaseUrl() . 'balance',
      Config::$apikey,
      Config::$username,
      false
    );
  }

  // account-inquiry Api

  public static function getAccountinquiry($params) {
    $result = ApiRequestor::post(
      Config::getBaseUrl() . 'account-inquiry',
      Config::$apikey,
      Config::$username,
      $params
    );

    return $result;
  }

  /** Get Account Inquiry Invoices
  *
  *
  * @method Get
  */
  public static function Invoices() {

    return ApiRequestor::get(
      Config::getBaseUrl() . 'account-inquiry/invoices',
      Config::$apikey,
      Config::$username,
      false
    );
  }

  /** Get Account Inquiry Invoices By Id
  *
  *
  * @method Get
  */
  public static function InvoicesId($params) {

    return ApiRequestor::get(
      Config::getBaseUrl() . 'account-inquiry/invoices/' . $params,
      Config::$apikey,
      Config::$username,
      false
    );
  }
}