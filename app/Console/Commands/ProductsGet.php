<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProductsGet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Executes the crawler responsible of webscraping and stores the result in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $productModel = new Product();
            //retrieve data using crawler
            $pagesProducts = $productModel->get();

            $storedProducts = $productModel::all();

            if (empty($storedProducts->count())) {
                $inserted = [];
                foreach ($pagesProducts as $pageProducts) {
                    foreach ($pageProducts as $product) {
                        if (!in_array($product['id'], $inserted)) {
                            $productModel = new Product();
                            $productModel->id = $product['id'];
                            $productModel->name = "{$product['name']}";
                            $productModel->picture = "{$product['picture']}";

                            if (!empty($product->options)) {
                                $options = [];
                                for ($i = 0; $i < count($product->options); $i++) {
                                    $options["{$i}"] = $product->options[$i];
                                }
                                $productModel->options = json_encode($options);
                            } else {
                                $productModel->options = null;
                            }

                            $productModel->price = $product['price'];

                            $productModel->save();
                            array_push($inserted, $product['id']);
                        }
                    }
                }
            }
            return "Awesome! Products has been stored in database";
        } catch (\Exception $exception) {
            Log::error(print_r($exception, true));
            return "Woops! Something went wrong: {$exception}";
        }

    }
}
