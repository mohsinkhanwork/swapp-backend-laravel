<?php

namespace App\Providers;

use App\Listeners\AdvertisementCheckout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\PaddleCancelSubscriptionEventListener;
use App\Listeners\PaddleSubscriptionEventListener;
use App\Listeners\StoreInvoice;
use Laravel\Paddle\Events\SubscriptionCanceled;
use Laravel\Paddle\Events\SubscriptionCreated;
use Laravel\Paddle\Events\TransactionCompleted;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SubscriptionCanceled::class =>[
            PaddleCancelSubscriptionEventListener::class
        ],
        TransactionCompleted::class =>[
            AdvertisementCheckout::class,
            StoreInvoice::class
        ],
        SubscriptionCreated::class =>[
            PaddleSubscriptionEventListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
