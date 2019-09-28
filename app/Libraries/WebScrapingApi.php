<?php


namespace App\Libraries;


class WebScrapingApi implements IApi
{
    public function get($url)
    {
        $config = (object)[
            "url" => $url,
            "method" => "GET",
        ];
//        return self::call($config);

        return ["Producto1", "Producto2"];

        //do web scrapping
    }

    public function post()
    {
        // TODO: Implement post() method.
    }

    public function put()
    {
        // TODO: Implement put() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
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
