<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('username')->comment('Логин');
            $table->string('name')->comment('ФИО');
            $table->string('email')->unique()->comment('Почта');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('Пароль');
            $table->string('avatar')->nullable()->comment('Фото');
            $table->string('passport')->nullable()->comment('Данные паспорта');      // Поле для паспорта, может быть NULL
            $table->boolean('is_visa')->default(false)->comment('Есть ли виза');  // Поле для визы, по умолчанию false
            $table->string('roles')->default('USER');
            $table->rememberToken();
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
