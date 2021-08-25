<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('liters')->default(1);
            $table->decimal('liter_price')->default(1);
            $table->decimal('total_price')->default(1);
            $table->enum('status', ['new', 'accepted' , 'finished' , 'fail'])->nullable()->default('new');

            $table -> unsignedBigInteger( 'worker_id' ) -> unsigned() -> index();
            $table -> foreign( 'worker_id' ) -> references( 'id' ) -> on( 'workers' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'user_id' ) -> unsigned() -> index();
            $table -> foreign( 'user_id' ) -> references( 'id' ) -> on( 'users' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'station_id' ) -> unsigned() -> index();
            $table -> foreign( 'station_id' ) -> references( 'id' ) -> on( 'stations' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'fuel_id' ) -> unsigned() -> index();
            $table -> foreign( 'fuel_id' ) -> references( 'id' ) -> on( 'fuels' )-> onDelete( 'cascade' );

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
        Schema::dropIfExists('orders');
    }
}
