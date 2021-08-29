<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationDuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_dues', function (Blueprint $table) {
            $table->id();
            $table->decimal('order_price', 10, 2)->default(20);

            $table -> unsignedBigInteger( 'order_id' ) -> unsigned() -> index();
            $table -> foreign( 'order_id' ) -> references( 'id' ) -> on( 'stations' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'station_wallet_id' ) -> unsigned() -> index();
            $table -> foreign( 'station_wallet_id' ) -> references( 'id' ) -> on( 'station_wallets' )-> onDelete( 'cascade' );

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
        Schema::dropIfExists('station_dues');
    }
}
