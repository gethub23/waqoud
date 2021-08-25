<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('name');
            $table->string('key')->default('+966');
            $table->string('phone');
            $table->string('password');
            $table->string('identity');
            $table->string('salary');
            $table->longText('token')->nullable();
            $table->enum('lang', ['ar', 'en'])->default('ar');
            $table -> unsignedBigInteger( 'city_id' ) -> unsigned() -> index();
            $table -> foreign( 'city_id' ) -> references( 'id' ) -> on( 'cities' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'station_id' ) -> unsigned() -> index();
            $table -> foreign( 'station_id' ) -> references( 'id' ) -> on( 'stations' )-> onDelete( 'cascade' );

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
        Schema::dropIfExists('workers');
    }
}
