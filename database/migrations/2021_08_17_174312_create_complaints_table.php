<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('phone')->nullable();
            $table->longText('complaint')->nullable();
            $table->enum('type', ['user', 'worker'])->nullable()->default('user');
            $table -> unsignedBigInteger( 'worker_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'worker_id' ) -> references( 'id' ) -> on( 'workers' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'user_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'user_id' ) -> references( 'id' ) -> on( 'users' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'station_id' ) -> unsigned() -> index()->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
