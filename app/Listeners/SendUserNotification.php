<?php

namespace App\Listeners;

use App\Events\LoanFillyPrecessed;
use App\Events\LoanFullyProcessed;
use App\Models\Customer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserNotification implements ShouldQueue
{
    public $afterCommit = true;
    /**
     * Handle the event.
     *
     * @param LoanFullyProcessed $event
     * @return void
     */
    public function handle(LoanFullyProcessed $event)
    {
        if ($event->customer->hasEmail()) {
            // return send mail notification
        }

        if ($event->customer->hasPhone()) {
            // return send phone notification
        }
    }
}
