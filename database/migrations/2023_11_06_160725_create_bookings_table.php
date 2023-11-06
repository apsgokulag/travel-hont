<?php

use App\Models\Client;
use App\Models\Currency;
use App\Models\Package;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();            
            $table->foreignIdFor(Client::class)->nullable()->constrained();
            $table->foreignIdFor(Package::class)->nullable()->constrained();
            $table->foreignIdFor(Currency::class)->nullable()->constrained();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->smallInteger('days')->nullable();
            $table->double('adult_amount')->nullable();
            $table->smallInteger('adult_count')->nullable();
            $table->double('children_amount')->nullable();
            $table->smallInteger('children_count')->nullable();
            $table->double('sub_total')->nullable();
            $table->double('discount_total')->nullable()->default(0);
            $table->double('total')->nullable(); 
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
