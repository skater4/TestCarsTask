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
        Schema::create('auction_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auction_item_id')->unique();
            $table->unsignedBigInteger('auction_id');
            $table->unsignedInteger('current_high_pre_bid');
            $table->string('custom_status')->nullable();
            $table->unsignedInteger('my_pre_bid')->nullable();
            $table->boolean('is_watched');
            $table->unsignedInteger('sequence_number');
            $table->timestamp('last_custom_status_set_at')->nullable();
            $table->year('year')->nullable()->index();
            $table->foreignId('make_id')
                ->constrained('makes')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('model')->nullable()->index();
            $table->unsignedInteger('odometer')->nullable();
            $table->string('units', 10)->nullable();
            $table->string('vehicle_location', 100)->nullable();
            $table->string('engine', 50)->nullable();
            $table->string('transmission', 20)->nullable();
            $table->string('color', 30)->nullable();
            $table->string('brand', 50)->nullable();
            $table->string('external_auction_item_id')->nullable();
            $table->unsignedInteger('winning_bid_amount');
            $table->string('winning_bid_location')->nullable();
            $table->boolean('is_biddable');
            $table->tinyInteger('status');
            $table->string('image', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_items');
    }
};
