<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoterInclusionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voter_inclusions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('voter_id')->nullable();
            $table->string('level')->nullable();
            $table->string('surname')->nullable();
            $table->string('other_names')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('email_update')->default(0);
            $table->boolean('phone_update')->default(0);
            $table->boolean('voter_id_update')->default(0);
            $table->boolean('voter_inclusion')->default(0);
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
        Schema::dropIfExists('voter_inclusions');
    }
}
