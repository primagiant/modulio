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
        Schema::create('quis_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id');
            $table->text("text");

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
        Schema::dropIfExists('quis_questions');
    }
};
