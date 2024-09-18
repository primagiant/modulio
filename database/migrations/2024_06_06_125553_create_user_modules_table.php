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
        Schema::create('user_modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('module_id');
            $table->timestamp('module_start')->nullable();
            $table->timestamp('module_end')->nullable();
            $table->text("resume_text")->nullable();
            $table->text("resume_score")->nullable();
            $table->timestamp('resume_start')->nullable();
            $table->timestamp('resume_end')->nullable();
            $table->text('reflection')->nullable();
            $table->text('teacher_feedback')->nullable();
            $table->integer('quis_score')->nullable();
            $table->timestamp('quis_start')->nullable();
            $table->timestamp('quis_end')->nullable();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('module_id')->references('id')
                ->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_modules');
    }
};
