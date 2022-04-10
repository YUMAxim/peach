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
        Schema::create('collaborator_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            // $table->bigInteger('user_id');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('budget');
            $table->integer('my_role');
            $table->integer('collaborator_role');
            $table->integer('page');
            $table->integer('book_size');
            $table->integer('file_format');
            $table->integer('desired_color_impression');
            $table->integer('desired_content_impression');
            // Review
            // $table->file('file_attachment');
            $table->dateTime('application_deadline');
            $table->date('deadline');
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
        Schema::dropIfExists('collaborator_requests');
    }
};
