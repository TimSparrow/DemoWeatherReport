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
        Schema::table('users', function (Blueprint $table) {
            $table->string('city', 255)->after('password');
            $table->string('country', 255)->after('city');
            $table->string('state', 2)->nullable()->after('country')->comment('USA only');
            $table->string('zip', 20)->nullable()->after('state');
            $table->string('region', 255)->nullable()->after('zip')->comment('Non-USA only');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('zip');
            $table->dropColumn('region');
        });
    }
};
