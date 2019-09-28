<?php


namespace App\Libraries;

use Goutte\Client;

class WebScrapingApi implements IApi
{
    public function get($url)
    {
        $products = [];

        $client = new Client();
        $crawler = $client->request('GET', $url);

        $products = $crawler->filter('.search-results-product')->each(function ($productNode) {
            $product = [
                'name' => $productNode->filter('h4 > a')->text(),
                'price' => $productNode->filter('h3.section-title')->text(),
                'options' => $productNode->filter('.result-list-item-desc-list li')->each(function ($node) {
                    return $node->text();
                }),
            ];
            return $product;
        });

        return $products;
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
}
