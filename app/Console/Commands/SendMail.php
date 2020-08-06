<?php

namespace App\Console\Commands;

use App\Mail\Relatorio;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de relatorio por eamil';

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
        Mail::to('hello@school.com')->send(new Relatorio($openedOrders));
    }
}
