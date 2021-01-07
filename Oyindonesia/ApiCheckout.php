<?php

namespace Oyindonesia;

class ApiChekout
{

    /** Use this Method to create payment checkout  
     *  URL which return parameters by encapsulation
     *
     * @method POST
     * "partner_tx_id": <string>
     * "description": <string>
     * "notes": <string>
     * "sender_name": "<string>"
     * "amount": "<int>"
     * "email" : "<string>"
     * "phone_number" : "<Numeric>"
     * "is_open" : "<boolean>"
     * "step" : "<string><opsiona>"
     * "include_admin_fee" : "<boolean>"
     * "list_disabled_payment_methods" : "<string>"
     * "list_enabled_banks" : "<string>"
     * "expiration" : "<datetime>"
     */
    public static function create($params)
    {
        $result = ApiRequestor::post(
            Config::getBaseUrl() . 'payment-checkout/create-v2',
            Config::$apikey,
            Config::$username,
            $params
        );

        return $result;
    }


    /** Use this Method to create payment checkout  
     *  URL which return parameters by encapsulation
     *
     * @method POST
     * "partner_tx_id": <string>
     * "description": <string>
     * "notes": <string>
     * "sender_name": "<string>"
     * "amount": "<int>"
     * "email" : "<string>"
     * "phone_number" : "<Numeric>"
     * "is_open" : "<boolean>"
     * "step" : "<string><opsiona>"
     * "include_admin_fee" : "<boolean>"
     * "list_disabled_payment_methods" : "<string>"
     * "list_enabled_banks" : "<string>"
     * "expiration" : "<datetime>"
     * "partner_user_id": "<string>"
     * "full_name" :  "<string>"
     * "is_va_lifetime":  "<boolean>"
     * "attachment":  "<Upload attachment (string base 64 pdf) and can be downloaded via the webview>"
     * "invoice_items": "<array>"
     */
    public static function createInvoice($params)
    {
        $result = ApiRequestor::post(
            Config::getBaseUrl() . 'payment-checkout/create-invoice',
            Config::$apikey,
            Config::$username,
            $params
        );

        return $result;
    }

    /** Use this Method to Check Payment Status  
     *
     * @method GET
     * @parameter <string><transaction uniq id>
     * @callback <boolean><set system to send callback> 
     */
    public static function status($tx_id, $callback = false)
    {
        $result = ApiRequestor::get(
            Config::getBaseUrl() . 'payment-checkout/status?partner_tx_id=' . $tx_id . '&send_callback=' . $callback,
            Config::$apikey,
            Config::$username,
            false
        );

        return $result;
    }
}
