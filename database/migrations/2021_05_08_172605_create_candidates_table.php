<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('election_id');
            $table->uuid('position_id');
            $table->string('color')->default('#1CA085');
            $table->string('first_name')->nullable();
            $table->string('other_names')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('is_active')->default(1);
            $table->longText('about')->nullable();
            $table->integer('order_of_appearance')->nullable();
            $table->bigInteger('tally')->nullable();
            $table->json('social_media_handles')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
