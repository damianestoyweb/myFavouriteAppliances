<?php

namespace App;

use App\Libraries\FactoryApi;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function get()
    {
        $sources = [
            'https://www.appliancesdelivered.ie/search/small-appliances?sort=price_desc',
            'https://www.appliancesdelivered.ie/dishwashers'
        ];
        $products = [];
        foreach ($sources as $source) {
            $products +=  FactoryApi::create('websScraping')->get($source);
        }

        return $products;
    }
}
