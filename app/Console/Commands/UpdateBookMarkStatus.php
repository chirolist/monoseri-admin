<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\BookMark;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

class UpdateBookMarkStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookmark:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update bookmark status';

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
        $bookmarks = BookMark::where('status', "=", 0)->get();

        foreach ($bookmarks as $bookmark) {
            try {
                $response = $client->request('GET', $bookmark->url, ["http_errors" => false]);
            } catch (ConnectException $e) {
                $status = 2;
            } catch (RequestException $e) {
                $status = 2;
            }

            echo $bookmark->title;
            echo PHP_EOL;
            echo $bookmark->url;
            echo PHP_EOL;
            echo $response->getStatusCode();
            echo PHP_EOL;

            switch ($response->getStatusCode()){
            case '200':
                $status = 1;
                break;
            case '500':
                $status = 2;
                break;
            case '404':
                $status = 3;
                break;
            default:
                $status = 0;
                break;
            }
            $bookmark->update(['status' => $status]);
        }

        return 0;
    }
}
