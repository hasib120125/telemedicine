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
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('phone',20)->unique()->nullable();
            $table->string('country',50)->nullable();
            $table->string('area',50);
            $table->string('thana',50);
            $table->string('district',50);
            $table->string('postal_code',50)->nullable();
            $table->string('gender',50)->nullable();
            $table->string('username',100)->unique();
            $table->string('email',100)->unique()->nullable();
            $table->string('password',200);
            $table->string('confirm_password',200);
            $table->string('user_type')->default('user')->nullable();
            $table->string('doctor_type')->nullable();
            $table->text('specialization')->nullable();
            $table->double('fee')->nullable();
            $table->string('visiting_hour')->nullable();
            $table->string('degree')->nullable();
            $table->string('chamber')->nullable();
            $table->string('skype')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('viber')->nullable();
            $table->string('imo')->nullable();
            $table->string('profile_picture')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
