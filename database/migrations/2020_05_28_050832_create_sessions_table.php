<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {

            $table->string('id');
            $table->foreignId('user_id')->nullable(true);

            $table->text('payload');
            $table->text('user_agent')->nullable(true);
            $table->string('ip_address', 45)->nullable(true);

            $table->integer('last_activity');

            $table->primary('id');
            $table->index('user_id');
            $table->index('last_activity');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}