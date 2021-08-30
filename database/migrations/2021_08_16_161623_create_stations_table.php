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
            $table->id();
            $table->text('avatar')->default('default.png');
            $table->string('name')->nullable();
            $table->string('key')->default('+966');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('boss_name')->nullable();
            $table->string('boss_avatar')->nullable();
            $table->string('boss_key')->default('+966');
            $table->string('boss_phone')->nullable();
            $table->string('boss_identity')->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('block')->default(false);
            $table->integer('code')->nullable();
            $table->dateTime('code_expire')->nullable();

            $table -> unsignedBigInteger( 'city_id' ) -> unsigned() -> index();
            $table -> foreign( 'city_id' ) -> references( 'id' ) -> on( 'cities' )-> onDelete( 'cascade' );

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
