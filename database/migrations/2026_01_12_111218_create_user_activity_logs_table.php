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
        Schema::create('user_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('activity_type')->comment('view, cart, purchase');
            $table->integer('weight')->default(1)->comment('1=view, 2=cart, 3=purchase');
            $table->string('session_id')->nullable()->comment('For guest users');
            $table->timestamp('created_at');

            // Index for faster queries
            $table->index(['user_id', 'activity_type']);
            $table->index(['session_id', 'activity_type']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activity_logs');
    }
};
