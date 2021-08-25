<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_devices', function (Blueprint $table) {
            $table->id();
            $table -> string( 'device_id' )->nullable();
            $table -> string( 'device_type' )->nullable();
            $table -> unsignedBigInteger( 'worker_id' ) -> unsigned() -> index();
            $table -> foreign( 'worker_id' ) -> references( 'id' ) -> on( 'workers' )-> onDelete( 'cascade' );
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
        Schema::dropIfExists('worker_devices');
    }
}
