<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OpenedOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:count-open';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Contagem de ordens aberta';

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
    public function handle()
    {
        $openedOrders = DB::table('orders')->where('status', '=', '0')->get();
        $count = count($openedOrders);
        Log::info((string)$count, (array)$openedOrders);
    }
}
