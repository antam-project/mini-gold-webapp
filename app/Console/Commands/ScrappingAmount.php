<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScrappingAmount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        return Command::SUCCESS;
    }
}
