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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('uv')->default(0.0)->comment('Level of UV triggering the alert');
            $table->float('precipitation')->default(0.0)->comment('Level of precipitation triggering the alert');
            $table->boolean('email')->default(false)->comment('Deliverable by email');
            $table->boolean('whatsapp')->default(false)->comment('Deliverable by whatsapp message');
        });

        // add a phone number to user model
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
        });
    }
};
