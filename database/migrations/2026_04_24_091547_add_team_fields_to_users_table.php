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
            $table->string('position')->nullable()->after('email');
            $table->text('bio')->nullable()->after('position');
            $table->boolean('is_visible')->default(true)->after('bio');
            $table->boolean('can_login')->default(true)->after('is_visible');
            $table->timestamp('deletion_requested_at')->nullable()->after('can_login');
            $table->integer('sort_order')->default(0)->after('deletion_requested_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['position', 'bio', 'is_visible', 'can_login', 'deletion_requested_at', 'sort_order']);
        });
    }
};
