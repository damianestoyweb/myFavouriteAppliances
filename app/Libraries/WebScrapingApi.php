<?php


namespace App\Libraries;

use Goutte\Client;

class WebScrapingApi implements IApi
{
    public function get($url)
    {
        $products = [];
        $numberOfPages = 1;

        $client = new Client();
        $crawler = $client->request('GET', $url . $numberOfPages);

        $linkToLastPage = $crawler->filter('.result-list-pagination a')->last()->attr('href');
        $numberOfPages = $this->getNumberOfPages($linkToLastPage);
        for ($i = 1; $i <= $numberOfPages; $i++) {
            $products = array_merge($products, $crawler->filter('.search-results-product')->each(function ($productNode) {
                $product = [
                    'id' => $this->getProductId($productNode->filter('h4 > a')->attr('href')),
                    'name' => $productNode->filter('h4 > a')->text(),
                    'image' => $productNode->filter('.product-image img')->attr('data-src'),
                    'price' => $productNode->filter('h3.section-title')->text(),
                    'options' => $productNode->filter('.result-list-item-desc-list li')->each(function ($node) {
                        return $node->text();
                    }),
                ];
                return $product;
            }));
        }
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

    private function getNumberOfPages(?string $linkToLastPage)
    {
        $number = 0;
        preg_match('/page=[0-9]?[0-9]/', $linkToLastPage, $matches);
        if (!empty($matches)) {
            $result = explode('=', $matches[0]);
            $number = $result[1];
        }

        return (int)$number;
    }

    private function getProductId($string)
    {
        $productId = '';
        preg_match("/\/(\d+)/",$string,$matches);
        if (!empty($matches)) {
            $result = explode('/', $matches[0]);
            $productId = $result[1];
        }

        return $productId;
    }
}
