<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_appeal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('log_id');
            $table->text('reason')->nullable();
            $table->enum('status', ['refuse', 'checking', 'ok'])
                ->comment('批复状态');
            $table->integer('censor_id')->nullable()->comment('处理人id');
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
        Schema::dropIfExists('sign_appeal');
    }
}
