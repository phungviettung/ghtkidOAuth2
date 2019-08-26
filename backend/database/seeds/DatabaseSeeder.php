<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        


        for($i=0;$i<50;$i++)
        {
            $idacc = 1000000000 + $i;
            $idad =  1000000000 + $i;
            $idapp = 1000000000 + $i;
            $idclients = 1000000000 + $i;
            $ideu = 1000000000 + $i;
            $title = rand(1,3);


            $pass = md5(md5(md5('ghtk123456')));
            $pass = $pass."oauth2ghtk_masterdev";
            $pass = md5($pass);

            $timestamp = time();
            $timestamp = date("Y-m-d h:i:s", $timestamp);


            // table accounts
            DB::table('accounts')->insert([
                'id' => $idacc,
                'email' => 'domanhquang.rnd'.$i.'@gmail.com',
                'password' => $pass,
                'status' => 1,
                'title' => $title,
                'created_at' => $timestamp,
            ]);
            
            // table admin
            DB::table('admin')->insert([
                'id' => $idad,
                'name' => Str::random(7),
                'info' => Str::random(17),
                'status' => 1,
                'idacc' => $idacc,
            ]);

            // table clients
            DB::table('clients')->insert([
                'id' => $idclients,
                'name' => Str::random(7),
                'info' => Str::random(17),
                'status' => 1,
                'idacc' => $idacc,
            ]);

            // table apps
            DB::table('apps')->insert([
                'id' => $idapp,
                'name_app' => Str::random(10),
                'callback_url' => Str::random(10).'.com',
                'status' => 1,
                'idclients' => $idclients,
                'created_at' => $timestamp,
            ]);


            // table enduser
            DB::table('enduser')->insert([
                'id' => $ideu,
                'dienthoai' => '0123456789',
                'tenshop' => Str::random(10),
                'gioitinh' => 1,
                'ngaysinh' => '2017-06-15',
                'img' => 'xxx',
                'status' => 1,
                'idacc' => $idacc,
                'created_at' => $timestamp,
            ]);
        }

    }
}
