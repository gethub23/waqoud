<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_users', function (Blueprint $table) {
            $table->id();
            
            $table->decimal('price', 10, 2)->nullable();

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
        Schema::dropIfExists('package_users');
    }
}
