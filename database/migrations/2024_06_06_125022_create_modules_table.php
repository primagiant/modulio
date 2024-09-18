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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('level_id');
            $table->string('pdf_path', 512)->nullable();
            $table->string('audio_path', 512)->nullable();
            $table->string('video_path', 512)->nullable();
            $table->string('name', 512);
            $table->text('desc');
            $table->text('source');
            $table->boolean('is_show');
            // $table->integer('kkm_pretest')->default(80);

            $table->foreign('class_id')->references('id')
                ->on('classes')->onDelete('cascade');
            $table->foreign('level_id')->references('id')
                ->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
};
