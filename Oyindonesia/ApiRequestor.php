<?php

namespace Oyindonesia;

/**
 * Send request to Oyindonesia API
 * Better don't use this class directly, use CoreApi, Transaction
 */

class ApiRequestor
{

  /**
   * Send GET request
   *
   * @param string  $url
   * @param string  $apikey
   * @param string  $username
   * @param mixed[] $data_hash
   */
  public static function get($url, $apikey, $username, $data_hash)
  {
    return self::remoteCall($url, $apikey, $username, $data_hash, false);
  }

  /**
   * Send POST request
   *
   * @param string  $url
   * @param string  $apikey
   * @param string  $username
   * @param mixed[] $data_hash
   */
  public static function post($url, $apikey, $username, $data_hash)
  {
    return self::remoteCall($url, $apikey, $username, $data_hash, true);
  }

  /**
   * Actually send request to API server
   *
   * @param string  $url
   * @param string  $apikey
   * @param string  $username
   * @param mixed[] $data_hash
   * @param bool    $post
   */
  public static function remoteCall($url, $apikey, $username, $data_hash, $post = true)
  {
    $ch = curl_init();

    $curl_options = array(
      CURLOPT_URL => $url,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json',
        'x-oy-username: ' . $username,
        'x-api-key: ' . $apikey,
      ),
      CURLOPT_RETURNTRANSFER => 1
    );

    // merging with Config::$curlOptions
    if (count(Config::$curlOptions)) {
      // We need to combine headers manually, because it's array and it will no be merged
      if (Config::$curlOptions[CURLOPT_HTTPHEADER]) {
        $mergedHeders = array_merge($curl_options[CURLOPT_HTTPHEADER], Config::$curlOptions[CURLOPT_HTTPHEADER]);
        $headerOptions = array(CURLOPT_HTTPHEADER => $mergedHeders);
      } else {
        $mergedHeders = array();
      }

      $curl_options = array_replace_recursive($curl_options, Config::$curlOptions, $headerOptions);
    }

    if ($post) {
      $curl_options[CURLOPT_POST] = 1;
      if ($data_hash) {
        $body = json_encode($data_hash);
        $curl_options[CURLOPT_POSTFIELDS] = $body;
      } else {
        $curl_options[CURLOPT_POSTFIELDS] = '';
      }
    }

    if ($data_hash) {
      $body = json_encode($data_hash);
      $curl_options[CURLOPT_POSTFIELDS] = $body;
    }



    curl_setopt_array($ch, $curl_options);


    $result = curl_exec($ch);
    $info = curl_getinfo($ch);
    // curl_close($ch);


    if ($result === false) {
      throw new \Exception('CURL Error: ' . curl_error($ch), curl_errno($ch));
    } else {
      try {
        $result_array = json_decode($result);
      } catch (\Exception $e) {
        throw new \Exception("API Request Error unable to json_decode API response: " . $result . ' | Request url: ' . $url);
      }
      if ($info['http_code'] == 403) {
        $data = [
          'status' => 403,
          'message' => 'Access Denied Check Username and API Access',
        ];
        echo json_encode($data, true);
        die;
      }

      if (!in_array($result_array->status->code, array(000))) {

        $data = [
          "status" => $result_array->status->code,
          "message" => $result_array->status->message,
        ];

        $message = json_encode($data, true);
        echo $message;
        die;
      } else {
        return $result_array;
      }
    }
  }
}
