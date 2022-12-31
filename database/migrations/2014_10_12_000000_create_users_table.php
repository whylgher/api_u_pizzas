<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('phone')->unique();
            $table->string('address');
            $table->enum('social_login',['GOOGLE','APPLE','APP'])->nullable(false);
            $table->string('img_url');
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
};
