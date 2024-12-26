<?php

namespace App\Services;

use App\Models\Subscription;
use App\Services\Weather\WeatherReportInterface;
use Dotenv\Parser\Parser;

class ReportSender
{
    public function __construct(
        private readonly WeatherReportInterface $weatherReport,
    ){}

    public function sendAlerts(): void
    {
        $this->sendEmails();
    }

    public function sendEmails(): void
    {
        $subscriptions = Subscription::getActiveForEMail();

        foreach ($subscriptions as $subscription) {
            $email = $subscription->email;
            $alerts = $subscription->getAlerts();
            $this->sendAlertsForUser($email, $alerts, $days);
        }
    }

    private function sendAlertsForUser(string $email, array $alerts, int $days): void
    {
        $reports = $this->weatherReport->getReportForPeriod();
    }

}
