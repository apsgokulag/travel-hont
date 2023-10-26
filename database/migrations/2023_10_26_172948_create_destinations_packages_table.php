<?php

use App\Models\Destination;
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
        Schema::create('destinations_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Destination::class)->nullable()->constrained();
            $table->foreignIdFor(Package::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations_packages');
    }
};
