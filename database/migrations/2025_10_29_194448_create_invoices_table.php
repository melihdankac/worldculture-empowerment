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
            $table->foreignId('donation_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('membership_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('invoice_addresses_id')->nullable()->constrained()->nullOnDelete();

            $table->string('invoice_number')->nullable(); // Örn: 2025-0001
            $table->enum('status', ['pending', 'issued', 'canceled'])->default('pending');
            $table->date('issue_date')->nullable();

            $table->decimal('amount', 10, 2)->default(0);
            $table->string('currency', 10)->default('EUR');

            $table->string('file_path')->nullable(); // PDF dosya yolu

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
