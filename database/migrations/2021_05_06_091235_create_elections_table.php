<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('election');
            $table->string('slug');
            $table->longText('about_election')->nullable();
            $table->string('authentication')->default('USERNAME_PASSWORD');
            $table->dateTime('start_date');
            $table->dateTime('app_start_date')->nullable();
            $table->dateTime('end_date');
            $table->dateTime('app_end_date')->nullable();
            $table->string('enable_exhibition')->default('NO');
            $table->dateTime('exhibition_start_date')->nullable();
            $table->dateTime('exhibition_end_date')->nullable();
            $table->string('banner_title')->default('Organise free and fair elections with Electo')->nullable();
            $table->string('banner_subtitle')->default('Organise realtime, free and fair paperless elections with few clicks.')->nullable();
            $table->boolean('auto_election')->default(0);
            $table->longText('how_to_vote')->nullable();
            $table->string('voters_name')->nullable('Voters');
            $table->boolean('is_active')->default(0);
            $table->boolean('is_sealed')->default(0);
            $table->boolean('status')->nullable();
            $table->boolean('provisional_results')->default(0);
            $table->string('email')->default('NO');
            $table->string('email_sender_name')->default('ELECTO')->nullable();
            $table->string('sms')->default('NO');
            $table->string('sms_sender_name')->default('ELECTO')->nullable();
            $table->string('username_title')->default('Email')->nullable();
            $table->string('password_title')->default('Password')->nullable();
            $table->uuid('ref')->nullable();
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
        Schema::dropIfExists('elections');
    }
}
