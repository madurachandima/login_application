<?php

include_once('../util/api_request.php');
include_once('../const/api_config.php');
include_once('../util/util.php');
include_once('../const/const.php');
/**
 * catch wallet.php button click
 * 
*/
if (isset($_POST["btn_get_wallet"])) {
    /**
     * create request parameters
     */
    $params = [
        "timestamp" => Util::returnTimeStamp(),
        "coin" => "BTC",
    ];

    /**
     * create signature
    */
    $sign = Util::returnSignedParams(Constant::BYBT_API_KEY, Constant::BYBT_SECRET_KEY, $params);
    /**
     * create API Url
    */
    $url = APiConfig::GET_WALLET.$sign;

    /**
     * call getRequest
    */
    $response = ApiRequest::getRequest($url);
    var_dump($response->result->BTC->wallet_balance);

}
