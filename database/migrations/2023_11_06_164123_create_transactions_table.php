<?php

use App\Models\Booking;
use App\Models\Currency;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Booking::class)->nullable()->constrained();
            $table->nullableMorphs('initiatable');
            $table->bigInteger('order_id')->nullable();
            $table->string('ref_payment_id')->nullable();
            $table->foreignIdFor(Currency::class)->nullable()->constrained();
            $table->double('total')->nullable(); 
            $table->text('notes')->nullable();
            $table->enum('type', ['refund', 'intent', 'capture'])->default('capture');
            $table->boolean('success')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
