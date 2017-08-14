<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('event_id');
            $table->enum('status', ['absent', 'off', 'late', 'attend'])
                ->comment('签到状态');
            $table->integer('excuse_id')->nullable()->comment('请假表id');
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
        Schema::dropIfExists('sign_logs');
    }
}
