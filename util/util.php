<?php
class Util
{
    /*
     *@param input text value
     * return formatted input text
     */
    public static function return_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /*
     * return timestamp
     */
    public static function returnTimeStamp()
    {
        $params['recv_window'] = 100000000;
        return $params['timestamp'] = time() * 1000;
    }
    /*
    *@param Api public_key
    *@param Api secret_key
    *@param url parameters array
    *return signature
    */
    public static  function returnSignedParams($public_key, $secret_key, $params)
    {
        $params = array_merge($params, ['api_key' => $public_key]);
        ksort($params);
        //decode return value of http_build_query to make sure signing by plain parameter string
        $signature = hash_hmac('sha256', urldecode(http_build_query($params)), $secret_key);
        return http_build_query($params) . "&sign=$signature";
    }
}
