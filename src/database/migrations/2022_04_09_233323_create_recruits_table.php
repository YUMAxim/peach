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
        Schema::create('recruits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('budget')->constrained('budgets');
            $table->foreignId('my_role')->constrained('my_roles');
            $table->foreignId('recruits_role')->constrained('recruits_roles');
            $table->foreignId('page')->constrained('pages');
            $table->foreignId('book_size')->constrained('book_sizes');
            $table->foreignId('file_format')->constrained('file_formats');
            $table->foreignId('desired_color_impression')->constrained('desired_color_impressions');
            $table->foreignId('desired_content_impression')->constrained('desired_content_impressions');
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
        Schema::dropIfExists('recruits');
    }
};
