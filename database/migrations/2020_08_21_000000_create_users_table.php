<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('key')->default('+966');
            $table->string('phone')->unique();
            $table->string('name')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar', 50)->default('default.png');
            $table->string('identity')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('address')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->enum('user_type', ['user', 'admin'])->default('user');
            $table->dateTime('birthdate')->nullable();
            $table->string('code', 10)->nullable();
            $table->dateTime('code_expire')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('block')->default(0);
            $table->boolean('subscribed')->default(0);
            $table->dateTime('subscribe_end')->nullable();
            $table->longText('token')->default('');
            $table->string('device_id')->default('');
            $table->integer('role_id')->default(0);
            $table->string('is_notify')->default(1);
            $table->string('lang', 2)->default('ar');
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
        Schema::dropIfExists('users');
    }
}
