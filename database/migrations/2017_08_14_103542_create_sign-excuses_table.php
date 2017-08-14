<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignExcusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_excuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->text('reason')->nullable();
            $table->enum('status', ['refuse', 'checking', 'ok']);
            $table->integer('censor_id');
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
        Schema::dropIfExists('sign_excuses');
    }
}
