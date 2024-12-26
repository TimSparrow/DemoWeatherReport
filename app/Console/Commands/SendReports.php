<?php

namespace App\Console\Commands;

use App\Services\ReportSender;
use Illuminate\Console\Command;

class SendReports extends Command
{

    public function __construct(private readonly ReportSender $reportSender){
        parent::__construct();
    }


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-reports {--days=5}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send weather alerts to subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->reportSender
                ->setDays($this->option('days'))
                ->sendAlerts();

            return 0;
        } catch (\Throwable $exception) {
            report($exception);
            return ($exception->getCode() ?: 1);
        }
    }
}
