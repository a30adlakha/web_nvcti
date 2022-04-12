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
            $table->string('name');
            $table->string('role');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('admissionNumber')->default(null);
            $table->string('branch')->default(null);
            $table->string('course')->default(null);
            $table->string('hostel')->default(null);
            $table->string('contactNumber')->default(null);
            $table->string('permanentAddress')->default(null);
            $table->string('dateOfBirth')->default(null);
            $table->string('gender')->default(null);
            $table->string('instituteName')->default(null);

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
