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
            $table->uuid('id')->primary();
            $table->string('first_name')->nullable();
            $table->string('other_names')->nullable();

            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('country_code')->default('GH')->nullable();
            $table->string('international_phone')->nullable();
            $table->string('voter_id')->nullable();
            $table->uuid('election_id')->nullable();
            $table->integer('votes_per_voter')->default(1);
            $table->string('access_role')->default('user');
            $table->string('password');
            $table->text('session_id')->nullable();
            $table->integer('otp')->nullable();
            $table->integer('voting_attempts')->nullable();

            $table->dateTime('email_checked_at')->nullable();
            $table->dateTime('system_checked_phone_at')->nullable();
            $table->dateTime('phone_checked_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('voted_at')->nullable();
            $table->timestamp('attempted_at')->nullable();
            $table->timestamp('otp_expires_at')->nullable();
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
