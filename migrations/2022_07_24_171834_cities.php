<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
        Schema::table('', function (Blueprint $table) {

        });
    }
}