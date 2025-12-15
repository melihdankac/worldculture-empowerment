<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscription_payments', function (Blueprint $table) {
            $table->id();

            // İlişkiler
            $table->foreignId('subscription_donation_id')
                ->constrained()
                ->cascadeOnDelete();

            // Stripe invoice ve payment bilgileri
            $table->string('stripe_invoice_id')->nullable();
            $table->string('stripe_payment_id')->nullable();

            // Ödeme detayları
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('EUR');
            $table->enum('status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_payments');
    }
};
