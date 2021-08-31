<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('iban');
            $table->string('account_name');
            $table->string('account_number');
            $table -> unsignedBigInteger( 'bank_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'bank_id' ) -> references( 'id' ) -> on( 'banks' )-> onDelete( 'cascade' );
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
        Schema::dropIfExists('station_accounts');
    }
}
