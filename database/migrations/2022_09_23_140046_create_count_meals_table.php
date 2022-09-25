<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('count_meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('breakfast')->nullable();
            $table->integer('lunch')->nullable()->default(0);
            $table->integer('dinner')->nullable()->default(0);
            $table->string('date')->nullable();
            $table->integer('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('count_meals');
    }
};
