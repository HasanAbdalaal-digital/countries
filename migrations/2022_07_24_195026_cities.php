<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cities extends Migration
{
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->unsignedInteger('region_id');
            $table->foreignId('region_id')->references('id')->on('regions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->unsignedInteger('region_id');
            $table->foreignId('region_id')->references('id')->on('regions')->cascadeOnDelete();
            $table->timestamps();
        });
    }
}