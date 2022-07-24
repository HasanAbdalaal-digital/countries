<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Regions extends Migration
{
//"id": 13,
//"capital_city_id": 2237,
//"code": "GO",
//"name_ar": "منطقة الجوف",
//"name_en": "Jawf",
//"population": 440009
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('capital_city_id');
            $table->string('code');
            $table->string('name_ar');
            $table->string('name_en');
            $table->integer('population');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('cities');
    }
}