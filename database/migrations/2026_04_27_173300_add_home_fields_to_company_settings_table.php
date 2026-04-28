<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->string('about_image')->nullable();
            $table->string('experience_years')->nullable();
            $table->string('experience_text')->nullable();
            $table->string('about_title')->nullable();
            $table->string('about_subtitle')->nullable();
            $table->text('about_description_1')->nullable();
            $table->text('about_description_2')->nullable();
            $table->string('about_feature_1')->nullable();
            $table->string('about_feature_2')->nullable();
            $table->string('nationwide_title')->nullable();
            $table->text('nationwide_description')->nullable();
            $table->string('nationwide_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn([
                'about_image',
                'experience_years',
                'experience_text',
                'about_title',
                'about_subtitle',
                'about_description_1',
                'about_description_2',
                'about_feature_1',
                'about_feature_2',
                'nationwide_title',
                'nationwide_description',
                'nationwide_image',
            ]);
        });
    }
};
