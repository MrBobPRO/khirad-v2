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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('filename');
            $table->string('image');
            $table->float('price');
            $table->text('description');
            $table->string('publisher');
            $table->integer('publish_year');
            $table->integer('pages');
            $table->integer('views');
            $table->boolean('most_readable');
            $table->string('slider_text_color')->nullable(); // text color
            $table->string('slider_background_color')->nullable(); // text color
            $table->string('slider_button_color')->nullable(); // text color
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
        Schema::dropIfExists('books');
    }
};
