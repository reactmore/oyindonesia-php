<?php

namespace Oyindonesia;

/**
 * Oyindonesia Configuration
 */
class Config
{

    /**
     * Your merchant's Api key
     * 
     * @static
     */
    public static $apikey;
    /**
     * Your merchant's Username
     * 
     * @static
     */
    public static $username;
    /**
     * True for production
     * false for sandbox mode
     * 
     * @static
     */
    public static $isProduction = false;
    /**
     * Default options for every request
     * 
     * @static
     */
    public static $curlOptions = array();

    const PRODUCTION_BASE_URL = 'https://partner.oyindonesia.com/api/';
    const SANDBOX_BASE_URL = 'https://api-stg.oyindonesia.com/api/';

    /**
     * Get baseUrl
     * 
     * @return string Oyindonesia API URL, depends on $isProduction
     */
    public static function getBaseUrl()
    {
        return Config::$isProduction ?
            Config::PRODUCTION_BASE_URL : Config::SANDBOX_BASE_URL;
    }

    /**
     * Load Configuration 
     */
    public static function Configurations($params)
    {
        Config::$apikey = $params['apikey'];
        Config::$username = $params['username'];
        ($params['production'] == true) ? Config::$isProduction  = true : Config::$isProduction;
    }
}
