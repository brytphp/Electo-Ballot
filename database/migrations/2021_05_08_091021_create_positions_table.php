<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('election_id');
            $table->string('position');
            $table->boolean('unopposed')->nullable();
            $table->string('next')->default('NEXT');
            $table->string('skip')->default('SKIP');
            $table->string('previous')->default('Previous');
            $table->string('slug');
            $table->string('color')->default('#1CA085');
            $table->boolean('can_skip')->default(0);
            $table->integer('order_of_appearance')->nullable();
            $table->integer('votes_per_voter')->default(0);
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('positions');
    }
}
