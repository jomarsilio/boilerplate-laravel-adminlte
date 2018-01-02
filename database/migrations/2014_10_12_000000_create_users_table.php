<?php

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
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100)->nullable();
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->boolean('active')->default(true);
            $table->timestamp('accessed_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('log_auths', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('username', 255);
            $table->string('method', 5);
            $table->string('url');
            $table->boolean('success')->default(false);
            $table->string('ip', 15);
            $table->string('user_agent');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_auths');
        Schema::dropIfExists('users');
    }
}
