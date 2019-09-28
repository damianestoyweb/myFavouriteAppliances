<?php


namespace App\Libraries;


abstract class FactoryApi
{
    public static function create($type){
        switch ($type){
            case 'websScraping': //implements API like methods after web scraping url
                return new WebScrapingApi();
                break;
            case 'api': //TODO: implements real API consuming methods
                return new Api();
                break;
        }
    }
}
