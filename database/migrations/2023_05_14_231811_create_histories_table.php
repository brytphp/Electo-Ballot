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
        Schema::create('histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('election');
            $table->string('slug');
            $table->boolean('auto_election')->default(0);
            $table->boolean('provisional_results')->default(0);
            $table->string('history_table_name');
            $table->longText('about_election')->nullable();
            $table->string('authentication')->default('username_password');
            $table->dateTime('start_date');
            $table->dateTime('app_start_date')->nullable();
            $table->dateTime('end_date');
            $table->dateTime('app_end_date')->nullable();
            $table->string('enable_exhibition')->default('no');
            $table->dateTime('exhibition_start_date')->nullable();
            $table->dateTime('exhibition_end_date')->nullable();
            $table->boolean('is_active')->default(0);
            $table->boolean('is_sealed')->default(0);
            $table->boolean('status')->nullable();
            $table->string('email')->default('no');
            $table->string('email_sender_name')->nullable();
            $table->string('sms')->default('no');
            $table->string('sms_sender_name')->nullable();
            $table->string('username_title')->nullable();
            $table->string('password_title')->nullable();
            $table->longText('how_to_vote')->nullable();
            $table->string('banner_title')->default('Organise free and fair elections with Electo')->nullable();
            $table->string('banner_subtitle')->default('Organize realtime, free and fair paperless elections with few clicks.')->nullable();
            $table->uuid('ref')->nullable();

            $table->integer('total_candidates')->nullable();
            $table->integer('total_positions')->nullable();
            $table->integer('total_voters')->nullable();
            $table->integer('total_vote_cast')->nullable();
            $table->integer('total_skipped_votes')->nullable();
            $table->float('percentage_turnout')->nullable();

            $table->json('elected_candidates')->nullable();

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
        Schema::dropIfExists('histories');
    }
};
