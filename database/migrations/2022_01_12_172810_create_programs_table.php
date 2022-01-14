<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->mediumText('short_description');
            $table->longText('long_description');
            $table->decimal('evaluation');
            $table->string('duration');
            $table->string('image');
            $table->string('Original_language');
            $table->string('subtitle_language')->nullable();
            $table->string('director');
            $table->string('production_year');
            $table->mediumText('video_url');
            $table->unsignedBigInteger('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
