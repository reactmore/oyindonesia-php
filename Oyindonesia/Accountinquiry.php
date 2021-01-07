<?php

namespace Oyindonesia;

// Use this API to get beneficiary account details.

class Accountinquiry
{

  /** Use this Method to  account-inquiry  
   *
   * @method POST
   * "bank_code" : <int>
   * "account_number" : <int>
   */
  public static function getAccountinquiry($params)
  {
    $result = ApiRequestor::post(
      Config::getBaseUrl() . 'account-inquiry',
      Config::$apikey,
      Config::$username,
      $params
    );

    return $result;
  }

  /** Use this Method to Get account-inquiry Invoice  
   *
   * @method Get
   * @parameter offset : <int> opsional
   * @parameter limit : <int> opsional
   * @parameter status : <PAID>|<Waiting> opsional
   */
  public static function Invoices()
  {

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
   * @parameter id : <String>
   */
  public static function InvoicesId($params)
  {

    return ApiRequestor::get(
      Config::getBaseUrl() . 'account-inquiry/invoices/' . $params,
      Config::$apikey,
      Config::$username,
      false
    );
  }

  // /** Get Pay Account Inquiry Invoices
  // *
  // *
  // * @method Get
  // */
  // public static function InvoicesPay($params) {

  //   return ApiRequestor::get(
  //     Config::getBaseUrl() . 'account-inquiry/invoices/pay',
  //     Config::$apikey,
  //     Config::$username,
  //     $params,
  //     false
  //   );
  // }
}
