<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\products;

class getCurrencys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data=[
            'file' => "example.png",
            'code' => 'PRD1565',
            'categoryID' => '1',
            'description' => "desc",
            'text'  => "text",
            'name' => "test",
            'choosen' => '1',
            'discount' => '1',
            'toprated' =>'1',
            'bestsellers' => '1',
            'price' => 99.99,
            'newPrice' => 180.00

        ];
        products::insert($data);
        return 0;
    }
}
