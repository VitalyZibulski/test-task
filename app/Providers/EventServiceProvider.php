<?php

namespace App\Providers;

use App\Events\FailedPayment;
use App\Events\LoanFullyProcessed;
use App\Events\PaymentRecieved;
use App\Events\RefundProcessed;
use App\Listeners\CreateRefund;
use App\Listeners\FailedPaymentProcess;
use App\Listeners\SendUserNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        RefundProcessed::class => [
            CreateRefund::class
        ],

        LoanFullyProcessed::class => [
            SendUserNotification::class
        ],

        PaymentRecieved::class => [
            SendUserNotification::class
        ],

        FailedPayment::class => [
            FailedPaymentProcess::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
