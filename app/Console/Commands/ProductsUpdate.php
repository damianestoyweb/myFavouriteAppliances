<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates database with new updated data from webscraping';

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
            $storedProducts = $productModel::all();
            if (!empty(count($storedProducts))) {
                DB::table('products')->truncate();
            }
            $this->call('products:get');

            return "Awesome! Products has been updated";
        } catch (\Exception $exception) {
            Log::error(print_r($exception, true));
            return "Woops! Something went wrong: {$exception}";
        }
    }
}
