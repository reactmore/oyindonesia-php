<?php

namespace Oyindonesia;

// Use this API to get beneficiary account details.

class Accountinquiry
{
    //Get Account Balance

    public static function balance()
    {

        return ApiRequestor::get(
            Config::getBaseUrl() . 'balance',
            Config::$apikey,
            Config::$username,
            false
        );
    }

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
}
