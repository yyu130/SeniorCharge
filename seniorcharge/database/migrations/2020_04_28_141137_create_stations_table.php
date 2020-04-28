<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('station_name');//varchar(255)
            $table->double('longitude');
            $table->double('latitude');
            $table->string('address');//varchar(255)
            $table->string('suburb');
            $table->string('postcode');
            $table->boolean('if_charger_working');
            $table->boolean('usb_a');
            $table->boolean('usb_c');
            $table->boolean('micro_usb');
            $table->boolean('plug_only');
            $table->string('establishment_type');
            $table->boolean('if_wifi');
            $table->boolean('if_bathroom');
            $table->string('access_type');
            $table->string('other_amenities');
            $table->integer('star_rating');
            $table->time('mon_open');
            $table->time('mon_close');
            $table->time('tue_open');
            $table->time('tue_close');
            $table->time('wed_open');
            $table->time('wed_close');
            $table->time('thu_open');
            $table->time('thu_close');
            $table->time('fri_open');
            $table->time('fri_close');
            $table->time('sat_open');
            $table->time('sat_close');
            $table->time('sun_open');
            $table->time('sun_close');
            $table->boolean('if_24h');
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
        Schema::dropIfExists('stations');
    }
}
