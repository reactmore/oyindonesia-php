<?php

namespace Oyindonesia;

// Use this API to get beneficiary account details.

class Disbursement
{
    /** Use this Method to start disbursing money 
     *  to a specific beneficiary account
     *
     * @method POST
     * "recipient_bank": <int>
     * "recipient_account": <int>
     * "amount": <int>
     * "note": "<string>"
     * "partner_trx_id": "<string>"
     * "email" : "<string>"
     */
    public static function remit($params)
    {
        $result = ApiRequestor::post(
            Config::getBaseUrl() . 'remit',
            Config::$apikey,
            Config::$username,
            $params
        );

        return $result;
    }

    /** Use this Method To get status of a disbursement request
     *  you can call this API. You may need to call this API few times until getting a final  
     *  status (success / failed)
     * 
     * @method POST
     * "partner_trx_id": <string|uniq_id>
     * "send_callback": <bool>
     */
    public static function remitStatus($params)
    {
        $result = ApiRequestor::post(
            Config::getBaseUrl() . 'remit-status',
            Config::$apikey,
            Config::$username,
            $params
        );

        return $result;
    }

    /** Use this Method to start disbursing money 
     *  With Scheduled
     * 
     * @method POST
     * "recipient_bank": <int>
     * "recipient_account": <int>
     * "amount": <int>
     * "note": "<string>"
     * "partner_trx_id": "<string>"
     * "email" : "<string>"
     * "schedule_date" : "<date>"
     */
    public static function scheduledRemit($params)
    {
        $result = ApiRequestor::post(
            Config::getBaseUrl() . 'scheduled-remit',
            Config::$apikey,
            Config::$username,
            $params
        );

        return $result;
    }

    /** Use this Method To get Balance Account
     * 
     * @method GET
     */

    public static function getBalance()
    {

        return ApiRequestor::get(
            Config::getBaseUrl() . 'balance',
            Config::$apikey,
            Config::$username,
            false
        );
    }
}
