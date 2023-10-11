<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('election_id');
            $table->uuid('position_id');
            $table->uuid('candidate_id')->nullable();
            $table->uuid('user_id');
            $table->uuid('ref')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->string('agent')->nullable();
            $table->string('platform')->nullable();
            $table->string('browser')->nullable();
            $table->string('device')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('robot')->nullable();
            $table->timestamp('voted_at')->nullable();
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
        Schema::dropIfExists('votes');
    }
}
