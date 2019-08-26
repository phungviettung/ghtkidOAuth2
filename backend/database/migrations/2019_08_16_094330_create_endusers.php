<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enduser', function (Blueprint $table) {
            $table->string('id','10');
            $table->string('dienthoai','15')->nullable();
            $table->string('tenshop','255')->nullable();
            $table->integer('gioitinh');
            $table->date('ngaysinh')->nullable();
            $table->longText('img')->nullable();
            $table->integer('status');
            $table->timestamps();
            $table->string('idacc','10'); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enduser');
    }
}
