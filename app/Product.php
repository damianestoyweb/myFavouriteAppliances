<?php

namespace App;

use App\Libraries\FactoryApi;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function get()
    {
        $sources = [
            'https://www.appliancesdelivered.ie/search/small-appliances?sort=price_desc&page=',
            'https://www.appliancesdelivered.ie/dishwashers?sort=price_desc&page='
        ];
        $products = [];
        foreach ($sources as $source) {
            $products = array_merge($products, FactoryApi::create('websScraping')->get($source));
        }

        return $products;
    }

    public function store($data)
    {
        $this->name = "{$data['name']}";
        $this->picture = "{$data['picture']}";
        $this->options = $data['options'];
        $this->price = $data['price'];

        $this->save();
    }
}
