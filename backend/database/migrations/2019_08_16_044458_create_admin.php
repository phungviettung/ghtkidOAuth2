<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmin extends Migration
{

    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->string('id','10');
            $table->string('idacc', '10');
            $table->string('name', '50');
            $table->string('info')->nullable();
            $table->integer('status');
        });
    }


    public function down()
    {
        Schema::drop('admin');
    }
}
