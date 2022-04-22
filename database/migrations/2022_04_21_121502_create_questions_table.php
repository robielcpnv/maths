<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('first');
            $table->integer('second');
            $table->unsignedBigInteger('operation_id');
            $table->unsignedBigInteger('exercise_id');
            $table->foreign('operation_id')->references('id')->on('operations')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('exercise_id')->references('id')->on('exercises')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('cycle');
            $table->string('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
