<?php

namespace App\Providers;

use App\Events\DonationFailed;
use App\Events\DonationSucceeded;
use App\Events\MembershipCancelled;
use App\Events\MembershipPaymentSucceeded;
use App\Events\SubscriptionPaymentFailed;
use App\Events\SubscriptionPaymentSucceeded;
use App\Listeners\HandleMembershipCancellation;
use App\Listeners\LogDonationFailure;
use App\Listeners\LogSubscriptionFailure;
use App\Listeners\SendDonationReceipt;
use App\Listeners\SendMembershipPaymentReceipt;
use App\Listeners\SendSubscriptionPaymentReceipt;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Stripe & Domain Events Provider
 *
 * - Donation lifecycle
 * - Subscription / Membership lifecycle
 * - Mail & async side effects
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        DonationSucceeded::class => [
            SendDonationReceipt::class,
        ],
        DonationFailed::class => [
            LogDonationFailure::class,
        ],

        SubscriptionPaymentSucceeded::class => [
            SendSubscriptionPaymentReceipt::class,
        ],
        SubscriptionPaymentFailed::class => [
            LogSubscriptionFailure::class,
        ],

        MembershipPaymentSucceeded::class => [
            SendMembershipPaymentReceipt::class,
        ],
        MembershipCancelled::class => [
            HandleMembershipCancellation::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }
}
