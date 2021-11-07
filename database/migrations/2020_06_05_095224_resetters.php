<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Resetters extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('resetters', function (Blueprint $table) {

            $table->string(config('fortify.email'), 64);
            $table->text('token');

            $table->timestamp('created_at', 0)->nullable(true);

            $table->index(config('fortify.email'));
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resetters');
    }
}