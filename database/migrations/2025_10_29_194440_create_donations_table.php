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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->nullable()->constrained()->nullOnDelete();

            $table->string('donation_type')->default('individual'); // individual | anonymous | company
            $table->string('supported_project')->nullable();

            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('EUR');
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('stripe_payment_id')->nullable()->index();
            $table->string('stripe_customer_id')->nullable()->index();

            $table->enum('recurring_interval', ['one_time', 'month', 'year', 'membership'])->nullable();
            $table->boolean('is_recurring')->default(false);

            $table->boolean('wants_invoice')->default(false);
            $table->foreignId('invoice_address_id')->nullable()->constrained()->nullOnDelete();
            $table->text('message')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
