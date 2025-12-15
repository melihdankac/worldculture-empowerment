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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('donor_id')->nullable()->constrained()->nullOnDelete();

            // Polymorphic ilişki: invoiceable
            $table->morphs('invoiceable');
            // invoiceable_id + invoiceable_type (Donation, MembershipPayment, SubscriptionDonation)

            $table->foreignId('invoice_address_id')->nullable()->constrained()->nullOnDelete();

            $table->string('invoice_number')->nullable();
            $table->enum('status', ['pending', 'issued', 'canceled'])->default('pending');
            $table->date('issue_date')->nullable();

            $table->decimal('amount', 10, 2)->default(0);
            $table->string('currency', 10)->default('EUR');

            $table->string('file_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
