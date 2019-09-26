<?php


namespace App\Libraries;


class Api
{
    public static function get($options)
    {
        $url = self::getEndpoint($options);
        $config = (object)[
            "url" => $url,
            "method" => "GET",
        ];
        list($code, $response) = self::call($config);
    }

    private static function getEndpoint($options)
    {
        return "https://www.appliancesdelivered.ie/search/small-appliances?sort=price_desc";
    }

    /**
     * @brief do curl request and retrieve data from api
     * @param $config
     * @return array
     */
    private static function call($config)
    {
        return [200, "ok"];
    }
}
