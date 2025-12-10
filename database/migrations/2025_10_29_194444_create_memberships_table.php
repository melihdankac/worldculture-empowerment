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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            // İlişkiler
            $table->foreignId('donor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('donation_id')->nullable()->constrained()->nullOnDelete();
            // Stripe ve ödeme bilgileri
            $table->string('stripe_subscription_id')->nullable(); // Stripe'dan dönen subscription ID
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            // Üyelik durumu
            $table->enum('membership_status', [
                'pending_verification',  // ödeme alındı, dernek onayı bekliyor
                'active',                // dernek tarafından resmi üye olarak onaylandı
                'rejected',              // dernek başvuruyu reddetti
                'cancelled',             // kullanıcı üyeliğini iptal etti
                'expired'                // süresi doldu (yıllık üyeliklerde)
            ])->default('pending_verification');
            // Üyelik tarihleri
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            // Manuel onay bilgileri
            $table->boolean('manual_approval')->default(false); // Dernek tarafından manuel onaylandı mı?
            $table->text('verification_notes')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable(); // admin id
            $table->timestamp('approved_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
