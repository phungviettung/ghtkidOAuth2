<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('logs', function (Blueprint $table) {
            $table->string('id', '10');
            $table->string('event','255');
            $table->integer('status');
            $table->timestamps();
            $table->string('idacc','10');
            $table->primary('id');
        });
    }


    public function down()
    {

        Schema::drop('logs');
    }
}
