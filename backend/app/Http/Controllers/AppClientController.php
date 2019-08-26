<?php

namespace App\Http\Controllers;
use App\App;
use App\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class AppClientController extends Controller
{
    
    public function getlogin()
    {
        return view('login');
    }
    public function logout()
    {
        // status session = 0
        $ss_token = $_COOKIE['session_token'];
        DB::table('sessions')->where('session_token', $ss_token)->update(
            array(
                'status' => 0,
            )
        );
        unset($_COOKIE['session_token']);
        setcookie('session_token', null, -1, '/');
        session_start();
        session_destroy();
        return view('login');
    }
    public function login(Request $request)
    {

        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required'
            ],
            [
                'name.required'=>'Bạn chưa nhập email',
                'name.email'=>'Bạn chưa nhập đúng định dạng email',
                'password.required'=>'Bạn chưa nhập password'
            ]);
        $pass=md5(md5(md5($request->password)));
        $pass=$pass."oauth2ghtk_masterdev";


        $pass=md5($pass);
        // var_dump($pass);
        //$pass = $request->password;

        $Account = Account::where('email',$request->email)->where("password",$pass)->first();
        if($Account!=null){

            $title = $Account->title;
            $acc_id = $Account->id;
            var_dump($acc_id);

            // create session
            $idss = Str::random(7).rand(100,999);
            $ss_token = Str::random(40);
            setcookie("session_token", $ss_token, time()+3600);
            DB::table('sessions')->insert([
                'id' => $idss,
                'sessionid' => $acc_id,
                'title' => $title,
                'session_token' => $ss_token,
                'status' => 1,
            ]);

            session_start();
            $_SESSION['id_account'] = $Account->id;
            $_SESSION['id_title'] = $title;


            if ($title==2) {

              return redirect('client/app/listapp');
               // return redirect('oauth2/oauth?appid=516&callback=npt2Uq6RWi.com');
                //header("Location: http://tronghasablog.com/oauth2?access_token=");
            }

            else if ($title==1) {
                return redirect('admin/dashboard');
            }

            else if ($title==3 && isset($request->app_id) && isset($request->callback)) {
                return redirect('oauth2/oauth?appid='.$request->app_id.'&callback='.$request->callback);
                // return 
            }
            else if ($title==3)
            {
                return redirect('profile');

            }
        }else{
            return view('login')->with('error','Đăng nhập không thành công!');
        }
        
    }

    public function getlistapp()
    {
    	$listApp=App::orderBy('created_at','desc')->paginate(10);
    	return view('client.app.list_app',compact('listApp'));
    }

    public function createdIDtable($table_name)
    {
        $table = DB::table($table_name)->orderBy('id', 'desc')->first();
        return $table->id +1;
    }

    public function addapp(Request $request)
    {
    	$this->validate($request,
    		[
    			'name'=>'required',
    			'callback' => array(
		            'required',
		            'regex:/(http:\/\/www\.|https:\/\/www\.)/'
		        )
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên app',
    			'callback.required'=>'Bạn chưa nhập callback URL',
    			'callback.regex'=>'Callback URL phải có dạng https: hoặc http:'
    		]);

        $App = new App;
        $App->id = $this->createdIDtable('apps');
    	$App->name_app=$request->name;
    	$App->callback_url=$request->callback;
    	$App->idclients=1;
        $App->status=1;
    	$App->save();

    	return redirect('client/app/listapp')->with('message','đăng ký thành công !');
    	
    }

    public function geteditapp()
    {
    	$idapp=$_GET['idapp'];
    	$getcl=App::where('id',$idapp)->first();
    	return view('client.app.edit_app',compact('getcl'));
    }

    public function editapp(Request $request,$idapp)
    {
    	$this->validate($request,
    		[
    			'name'=>'required',
    			'callback' => array(
		            'required',
		            'regex:/(http:\/\/www\.|https:\/\/www\.)/'
		        )
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên app',
    			'callback.required'=>'Bạn chưa nhập callback URL',
    			'callback.regex'=>'Callback URL phải có dạng https: hoặc http:'
    		]);
    	$App = App::where('id',$idapp)->first();
    	$App->name_app=$request->name;
    	$App->callback_url=$request->callback;
    	$App->save();
    	return redirect('client/app/listapp')->with('message','Cập nhập app thành công !');
    	
    }

    public function getdelapp()
    {
    	$idapp = $_GET['idapp'];
    	$getcl = App::where('id',$idapp)->first();
    	return view('client.app.del_app',compact('getcl'));
    }

    public function getbtnapp()
    {
    	$idapp = $_GET['idapp'];
    	$getcl = App::where('id',$idapp)->first();
    	return view('client.app.btn_app',compact('getcl'));
    }

    public function delapp($idapp)
    {
    	App::where('id',$idapp)->delete();
    	return redirect('client/app/listapp')->with('message','Xóa app thành công !');
    	
    }
}
