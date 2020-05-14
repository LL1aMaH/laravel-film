<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('genre');
            $table->float('rating',5,2);
            $table->text('description');
            $table->string('posters');
            $table->string('trailerURL');
            $table->integer('reviews')->unsigned();
            $table->date('dateRelease');
        });
        DB::statement("
            ALTER TABLE films 
            MODIFY COLUMN genre
            SET('russian','english','german','spanish','italian','mongolian','chinese','kazakh') 
            NOT NULL 
            DEFAULT 'russian';
");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
