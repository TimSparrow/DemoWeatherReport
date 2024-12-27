<?php

use App\Services\Weather\WeatherAlert;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Creates a table for alert subscriptions
     * A subscription connects one user to one alert and one delivery method
     * A subscription may be suspended (active=false) or expire (active_to)
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            $table->boolean('active')->default(true);
            $table->dateTime('active_from')->nullable();
            $table->dateTime('active_to')->nullable();
            $table->enum('condition', WeatherAlert::getAlerts());
            $table->string('delivery')->default('email');

            $table->unique(['user', 'condition', 'delivery']);
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
