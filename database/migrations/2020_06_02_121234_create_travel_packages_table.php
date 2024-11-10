<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable()->comment('Наименование путевки');
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            $table->longText('about')->nullable();
            $table->string('featured_event')->nullable();
            $table->string('language')->nullable();
            $table->string('foods')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('duration')->nullable();
            $table->integer('price')->nullable();
//            $table->softDeletes();
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
        Schema::dropIfExists('travel_packages');
    }
}
