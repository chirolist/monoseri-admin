<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Customer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

class InsertDummyCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dummy:customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert dummy customer';

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
     * @return int
     */
    public function handle(Client $client)
    {
        for ($i=0; $i<1000; $i++) {
            $customer = factory(Customer::class)->make();
            $customer->save();
        }

        return 0;
    }
}
