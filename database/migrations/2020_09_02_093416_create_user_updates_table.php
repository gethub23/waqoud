<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_updates', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['password', 'phone'])->nullable()->default('phone');
            $table->string('phone')->nullable();
            $table->string('code')->nullable();
            $table->string('key')->nullable();

             $table -> unsignedBigInteger( 'user_id' ) -> unsigned() -> index();
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
        Schema::dropIfExists('user_updates');
    }
}
