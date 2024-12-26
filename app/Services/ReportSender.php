<?php

namespace App\Services;

use App\Models\Subscription;
use App\Models\User;
use App\Services\Weather\WeatherReporterInterface;
use Dotenv\Parser\Parser;

class ReportSender
{

    private int $days;

    public function __construct(
        private readonly WeatherReporterInterface $weatherReport,
    ){}

    public function sendAlerts(): void
    {
        $this->sendEmails();
    }

    public function sendEmails(): void
    {
        $subscriptions = Subscription::getActiveForEMail();

        foreach ($subscriptions as $subscription) {

            $alerts = $subscription->getAlerts();

            $this->sendAlertsForUser($subscription->user, $alerts, $this->days);
        }
    }

    private function sendAlertsForUser(User $user, array $alerts, int $days): void
    {
        $reports = $this->weatherReport->getReportForPeriod($user->getLocation(), $days);

    }

    public function getDays(): int
    {
        return $this->days;
    }

    public function setDays(int $days): ReportSender
    {
        $this->days = $days;
        return $this;
    }

}
