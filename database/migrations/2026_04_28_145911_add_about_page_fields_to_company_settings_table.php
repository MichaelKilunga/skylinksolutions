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
        Schema::table('company_settings', function (Blueprint $table) {
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->string('why_choose_us_title')->nullable();
            $table->text('why_choose_us_subtitle')->nullable();
            $table->string('software_projects_count')->nullable();
            $table->string('networking_systems_count')->nullable();
            $table->string('security_systems_count')->nullable();
            $table->string('automation_systems_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn([
                'vision_title',
                'vision_description',
                'mission_title',
                'mission_description',
                'why_choose_us_title',
                'why_choose_us_subtitle',
                'software_projects_count',
                'networking_systems_count',
                'security_systems_count',
                'automation_systems_count',
            ]);
        });
    }
};
