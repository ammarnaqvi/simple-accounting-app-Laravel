<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Account;

class MonthlyProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account:monthlyprofit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate and credit monthly profit on all savings accounts';

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
        \Log::info('i was here @ ' . \Carbon\Carbon::now());


        $accounts = Account::where('type', 1)->get();

        foreach ($accounts as $account) {
            $profit = $account->balance * (0.5 * (1 / 12));
            $account->balance += $profit;   
            $account->save();             
        }
    }
}
