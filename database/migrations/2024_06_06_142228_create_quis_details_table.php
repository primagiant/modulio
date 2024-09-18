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
        Schema::create('quis_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_module_id');
            $table->integer('question_order');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id');

            $table->foreign('user_module_id')->references('id')
                ->on('user_modules')->onDelete('cascade');
            $table->foreign('question_id')->references('id')
                ->on('quis_questions')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')
                ->on('quis_answers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quis_details');
    }
};
