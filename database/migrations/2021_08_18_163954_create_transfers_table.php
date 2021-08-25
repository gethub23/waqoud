<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('bank_from_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('amount')->nullable();
            $table->string('image')->nullable();
            $table->enum('accepted', ['new', 'accepted' , 'refused'])->nullable()->default('new');
            $table->enum('type', ['year', 'charge'])->nullable()->default('charge');

            $table -> unsignedBigInteger( 'bank_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'bank_id' ) -> references( 'id' ) -> on( 'banks' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'package_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'package_id' ) -> references( 'id' ) -> on( 'packages' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'user_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'user_id' ) -> references( 'id' ) -> on( 'users' )-> onDelete( 'cascade' );


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
        Schema::dropIfExists('transfers');
    }
}
