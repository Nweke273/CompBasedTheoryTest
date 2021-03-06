<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
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
            $table->string('course');
            $table->unsignedBigInteger('lecturer_id')->nullable();
            $table->string('question');
            $table->unsignedInteger('marks_obtainable');
            $table->json('answers');
            $table->timestamps();

            $table->foreign('lecturer_id')
            ->references('id')
            ->on('lecturers')
            ->onDelete('cascade');
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
}
