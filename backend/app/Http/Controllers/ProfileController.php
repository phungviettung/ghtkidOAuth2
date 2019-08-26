<?php

namespace App\Http\Controllers;

use App\End_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(){
        session_start();
        $u = DB::table('enduser')
            ->join('accounts', 'enduser.idacc', '=', 'accounts.id')
            ->where('accounts.id',$_SESSION['id_account'])->get();
        return view('profile', compact('u'));
    }

    public function upLoad(Request $request){
        session_start();
        $this->validate($request, 
            [
                //kiem tra gia tri rong và phone va email
                'name' => 'required',
                'email' => 'required|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^', 
                'phone' => 'required|regex:/(3)[0-9]{8}\b/'
            ],
            [
                'name.required' => 'Tên không được để trống',
                'phone.regex' => 'Số điện thoại bắt đầu bằng 03 và có 10 chữ số',
                'phone.required' => 'Số điện thoai không được để trống',
                'email.required' => 'Email không được để trống',
                'email.regex' => 'email chưa đúng định dạng, vui lòng nhập lại',
            ]
        );
        if ($request->hasFile('file')) {
            $this->validate($request,
            [
                //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'file' => 'mimes:jpg,jpeg,png,gif|max:1024',
            ],
            [
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'file.mimes' => 'Chỉ chấp nhận hình  với đuôi .jpg .jpeg .png .gif',
				'file.max' => 'Hình giới hạn dung lượng không quá 1M',
			]
            );

            $image = $request->file('file');


            // convert base64 and save database
            $image_csdl = base64_encode(file_get_contents($image));
        
            echo '<img src="data:image/gif;base64,' . $image_csdl. '" />';
            //
          
            // lưu vào server /resource/assets/imageupload
            $namefile= $_SESSION['id_account'] . '_' . time() . '_' . $image->getClientOriginalName();
            $destinationPath = resource_path('assets/imageUpload');
            $image->move($destinationPath, $namefile);

            //update database

            $name = $request->input('name');
            //echo $name;
            $phone = $request->input('phone');
            //echo $phone;
            $email = $request->input('email');
            //echo $email;
            $username = $request->input('username');
            //echo $username;
            $passwordnew1 = $request->input('passwordnew1');
            //echo $passwordnew1;
            $passwordnew2 = $request->input('passwordnew2');
            //echo $passwordnew2;
            
            $u = DB::table('enduser')
            ->join('accounts', 'enduser.idacc', '=', 'accounts.id')
            ->where('accounts.id',$_SESSION['id_account'])->get();
            
            //update database
            DB::table('enduser')
           ->where('id', $_SESSION['id_account'])
           ->update(
                    ['tenshop' => $name]
                    
                    );
            DB::table('enduser')
            ->where('id', $_SESSION['id_account'])
            ->update(
                    ['dienthoai' => $phone]
                    );
            DB::table('enduser')
           ->where('id', $_SESSION['id_account'])
           ->update(
                   
                    ['img' => $image_csdl] 
                    ); 
            DB::table('accounts')
            ->where('id', $_SESSION['id_account'])
            ->update(
                    ['email' => $email]
                    );
        }else {
            //update database
            $name = $request->input('name');
            echo $name;
            $phone = $request->input('phone');
            echo $phone;
            $email = $request->input('email');
            echo $email;
            $username = $request->input('username');
            echo $username;
            $passwordnew1 = $request->input('passwordnew1');
            echo $passwordnew1;
            $passwordnew2 = $request->input('passwordnew2');
            echo $passwordnew2;
          

           $u = DB::table('enduser')
            ->join('accounts', 'enduser.idacc', '=', 'accounts.id')
            ->where('accounts.id',$_SESSION['id_account'])->get();

           DB::table('enduser')
           ->where('id', $_SESSION['id_account'])
           ->update(
                    ['tenshop' => $name]
                    );
            DB::table('enduser')
            ->where('id', $_SESSION['id_account'])
            ->update(
                    ['dienthoai' => $phone]
                    );
            DB::table('accounts')
            ->where('id', $_SESSION['id_account'])
            ->update(['email' => $email]);
        }


        
        return redirect()->action('ProfileController@index');
    }

    public function changepass(Request $request){
        $currentPassword = $request->input('currentPassword');
        echo $currentPassword;
        $newPassword = $request->input('newPassword');
        echo $newPassword;
        $confirmPassword = $request->input('confirmPassword');
        echo $confirmPassword;
        $this->validate($request,
        [
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required'
        ],
        [
            'currentPassword.required' => 'mật khẩu hiện tại sai, vui lòng thử  lại',
            'newPassword.required' => 'mật khẩu không được trống',
            'confirmPassword.required' => 'mật khẩu không được trống'
        ]
        );
        session_start();
            $mess='';
            $u = DB::table('enduser')
            ->join('accounts', 'enduser.idacc', '=', 'accounts.id')
            ->where('accounts.id',$_SESSION['id_account'])->get();        //dd($u);
        $check = strcmp($newPassword, $confirmPassword);
        if ($check == 0) {
                $a = md5(md5(md5($currentPassword)));
                $a = $a."oauth2ghtk_masterdev";
                $a = md5($a);
            if ($a == $u[0]->password) {
                $b = md5(md5(md5($newPassword)));
                $b = $b . "oauth2ghtk_masterdev";
                $b = md5($b);
                DB::table('accounts')
                    ->where('id', $_SESSION['id_account'])
                    ->update(['password' => $b]);
                $mess = 'Đổi mật khẩu thành công';
                echo $mess;
            }else {
                $mess = "Mật khẩu bạn nhập cho tài khoản này có vẻ như đã sai, hãy thử lại";
                echo $mess;
            }
        }else {
            $mess = "Mật khẩu bạn nhập lại chưa khớp";
            echo $mess;
        }
        
        return redirect('profile')->with('messname',$mess);
    }
    
    public function logout(){
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

}
