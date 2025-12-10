<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tek seferlik test bağış
        Donation::create([
            'donor_name' => 'John Doe',
            'email' => 'john@example.com',
            'amount' => 50.00,
            'currency' => 'EUR',
            'payment_method' => 'stripe',
            'payment_status' => 'succeeded',
            'stripe_payment_id' => Str::random(10),
            'message' => 'Test bağışı',
            'is_recurring' => false,
            'recurring_interval' => null,
            'is_anonymous' => false,
            'stripe_customer_id' => Str::random(10),
        ]);

        // Örnek abonelik bağışı
        Donation::create([
            'donor_name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'amount' => 20.00,
            'currency' => 'EUR',
            'payment_method' => 'stripe',
            'payment_status' => 'succeeded',
            'stripe_payment_id' => Str::random(10),
            'message' => 'Aylık bağış',
            'is_recurring' => true,
            'recurring_interval' => 'monthly',
            'is_anonymous' => false,
            'stripe_customer_id' => Str::random(10),
        ]);
    }
}
