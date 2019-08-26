<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <style type="text/css">
    	body{
    background:#eee;    
}
.widget-author {
  margin-bottom: 58px;
}
.author-card {
  position: relative;
  padding-bottom: 48px;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
}
.author-card .author-card-cover {
  position: relative;
  width: 100%;
  height: 100px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.author-card .author-card-cover::after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  content: '';
  opacity: 0.5;
}
.author-card .author-card-cover > .btn {
  position: absolute;
  top: 12px;
  right: 12px;
  padding: 0 10px;
}
.author-card .author-card-profile {
  display: table;
  position: relative;
  margin-top: -22px;
  padding-right: 15px;
  padding-bottom: 16px;
  padding-left: 20px;
  z-index: 5;
}
.author-card .author-card-profile .author-card-avatar, .author-card .author-card-profile .author-card-details {
  display: table-cell;
  vertical-align: middle;
}
.author-card .author-card-profile .author-card-avatar {
  width: 85px;
  border-radius: 50%;
  box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
  overflow: hidden;
}
.author-card .author-card-profile .author-card-avatar > img {
  display: block;
  width: 100%;
}
.author-card .author-card-profile .author-card-details {
  padding-top: 20px;
  padding-left: 15px;
}
.author-card .author-card-profile .author-card-name {
  margin-bottom: 2px;
  font-size: 14px;
  font-weight: bold;
}
.author-card .author-card-profile .author-card-position {
  display: block;
  color: #8c8c8c;
  font-size: 12px;
  font-weight: 600;
}
.author-card .author-card-info {
  margin-bottom: 0;
  padding: 0 25px;
  font-size: 13px;
}
.author-card .author-card-social-bar-wrap {
  position: absolute;
  bottom: -18px;
  left: 0;
  width: 100%;
}
.author-card .author-card-social-bar-wrap .author-card-social-bar {
  display: table;
  margin: auto;
  background-color: #fff;
  box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
}
.btn-style-1.btn-white {
    background-color: #fff;
}
.list-group-item i {
    display: inline-block;
    margin-top: -1px;
    margin-right: 8px;
    font-size: 1.2em;
    vertical-align: middle;
}
.mr-1, .mx-1 {
    margin-right: .25rem !important;
}

.list-group-item.active:not(.disabled) {
    border-color: #e7e7e7;
    background: #fff;
    color: #ac32e4;
    cursor: default;
    pointer-events: none;
}
.list-group-flush:last-child .list-group-item:last-child {
    border-bottom: 0;
}

.list-group-flush .list-group-item {
    border-right: 0 !important;
    border-left: 0 !important;
}

.list-group-flush .list-group-item {
    border-right: 0;
    border-left: 0;
    border-radius: 0;
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
.list-group-item:last-child {
    margin-bottom: 0;
    border-bottom-right-radius: .25rem;
    border-bottom-left-radius: .25rem;
}
a.list-group-item, .list-group-item-action {
    color: #404040;
    font-weight: 600;
}
.list-group-item {
    padding-top: 16px;
    padding-bottom: 16px;
    -webkit-transition: all .3s;
    transition: all .3s;
    border: 1px solid #e7e7e7 !important;
    border-radius: 0 !important;
    color: #404040;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    text-decoration: none;
}
.list-group-item {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,0.125);
}
.list-group-item.active:not(.disabled)::before {
    background-color: #ac32e4;
}

.list-group-item::before {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 3px;
    height: 100%;
    background-color: transparent;
    content: '';
}
/* css đổi mật khẩu */
        /*phần tử phủ toàn màn hình,không được hiển thị*/
        #over {
    display: none;
    background: #000;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0.8;
    z-index: 999;
}
a, a:visited, a:active{
    text-decoration:none;
}
.login
{
    background-color:#85B561;
    height:auto;
    width:450px;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:14px;
    padding-bottom:5px;
    display:none;
    overflow:hidden;
    position:absolute;
    z-index:99999;
    top:10%;
    left:50%;
    margin-left:-300px;
}
 
.login .login_title
{
    color:white;
    font-size:16px;
    padding:8px 0 5px 8px;
    text-align:left;
}
 
.login-content label {
    display: block;
    padding-bottom: 7px;
}
 
.login-content span {
    display: block;
}
.login-content
{
    padding-left:35px;
    background-color:white;
    margin-left:5px;
    margin-right:5px;
    height:auto;
    padding-top:15px;
    overflow:hidden;
}
 
.img-close {
    float: right;
    margin-top:-43px;
    margin-right:5px
}
.button{
    display: inline-block;
    min-width: 46px;
    text-align: center;
    color: #444;
    font-size: 14px;
    font-weight: 700;
    height: 36px;
    padding: 0px 8px;
    line-height: 36px;
    border-radius: 4px;
    transition: all 0.218s ease 0s;
    border: 1px solid #DCDCDC;
    background-color: #F5F5F5;
    background-image: -moz-linear-gradient(center top , #F5F5F5, #F1F1F1);
    cursor: pointer;
}
.button:hover{
     border: 1px solid #DCDCDC;
    text-decoration: none;
    -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    box-shadow: 0 2px 2px rgba(0,0,0,0.1);
}
.login input
{
    border:1px solid #D5D5D5;
    border-radius:5px;
    box-shadow:1px 1px 5px rgba(0,0,0,.07) inset;
    color:black;
    font:12px/25px "Droid Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
    height:28px;
    padding:0px 8px;
    word-spacing:0.1em;
    width:300px;
}
.submit-button{
    display: inline-block;
    padding: auto;
    margin: 15px 75px;
    width: 150px;
}

</style>
</head>

<body>
    

<form enctype="multipart/form-data" method="POST" action="{{ url('profile-update') }}">
    {{ csrf_field()}}
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3">
                <div class="author-card-cover" style="background-image: url(https://static.topcv.vn/company_covers/vTjWMNdBEet9M2c6dZDd.jpg);"><a class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward points to spend"><i class="fa fa-award text-md"></i>&nbsp;290 điểm</a></div>
                <div class="author-card-profile">
                    <div class="author-card-avatar">
                        
                        <img id="blah" src="#" style="display:none" />
                        {{-- echo '<img src="data:image/gif;base64,' . $image_csdl. '" />'; --}}
                        <img id = "imgcsdl" src="data:image/gif;base64,<?php echo $u[0]->img?> " /> 

                            <div style = "position: relative;
                                            overflow: hidden; font-size: 18px;" 
                                            class="file btn btn-lg btn-success " name = "upfile">
                                Đổi ảnh
                                <input style = "position: absolute;
                                font-size: 100px;
                                opacity: 0; 
                                right: 0;
                                top: 0;"type="file" name="file" accept=".png, .jpg, .jpeg" id="imgInp"/>
                                 <input type="hidden" name="base64" id="inputBase64">
                            </div>
                        
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg">
                            @php 
                                echo $u[0]->tenshop 
                            @endphp
                        </h5><span class="author-card-position">
                            @php
                                //$date = date('D', strtotime($u[0]['birthday']));
                                echo $u[0]->ngaysinh; 
                            @endphp
                            </span>
                    </div>
                </div>
                
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item" href="#">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Đơn trong ngày </div>
                            </div><span class="badge badge-secondary">6</span>
                        </div>
                    </a>
                    <a class="list-group-item " href="#">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Đơn đã giao </div>
                            </div><span class="badge badge-secondary">3</span>
                        </div>
                    </a>
                    <a class="list-group-item active " href="#">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Thông tin tài khoản </div>
                            </div>
                        </div>
                    </a>
                    <a class="list-group-item " href="/profile/logout">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Đăng xuất</div>
                            </div><span class='glyphicon glyphicon-log-out'></span>
                        </div>
                    </a>
                </nav>
            </div>
        </div>
        <!-- Profile Settings-->

        <div class="col-lg-8 pb-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">Tên</label>
                        <input name = "name" class="form-control" type="text" id="account-fn"  value=<?php echo $u[0]->tenshop ?> required="" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">Địa chỉ email</label>
                        <input name = "email" class="form-control" type="email" id="account-email"  value=<?php echo $u[0]->email ?> required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Số điện thoại</label>
                        <input name = "phone" class="form-control" type="text" id="account-phone" value=<?php echo $u[0]->dienthoai ?> required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-pass">Mật khẩu</label>
                        <input name = "password" class="form-control" type="password" id="account-pass" value="*********" disabled="">
                        <span class="input-group-btn">
                                <a class="login-window button" href="#login-box">Đổi mật khẩu</a>
                        </span>
                    </div>
                </div>
                @if (session('messname'))
                    <div class="alert alert-success">
                        <p>{{ session('messname') }}</p>
                    </div>
                @endif
                {{-- thông báo lỗi nếu cố tình nhập sai định dạng --}}
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    @endif
                {{-- kết thúc thông báo lỗi nếu cố tình nhập sai định dạng --}}
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="custom-control custom-checkbox d-block">
                        </div>
                        <input type="submit" name="submit" value="Cập Nhập" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
<!--form đổi mật khẩu-->
    <div class="login" id="login-box">Đổi mật khẩu
        <a class="close" href="#"><img class="img-close" title="Close Window" alt="Close" src="close.png" /></a>
    <form class="login-content"  name="frmChange" method="post"  id="password_form"  onsubmit = "return validatePassword()" action="{{ url('changepass') }}">
            {{ csrf_field()}}
        <label >
            <span>Mật khẩu hiện tại </span>
            <input  type="password" name="currentPassword" class="txtField"/><span style="color:red" id="currentPassword"  class="required"></span>
        </label>
        <label >
            <span>Mật khẩu mới </span>
            <input type="password" name="newPassword" class="txtField"/><span  style="color:red" id="newPassword" class="required"></span>
        </label>
        <label >
            <span>Nhập lại Mật khẩu mới </span>
            <input  type="password" name="confirmPassword" class="txtField"/><span  style="color:red" id="confirmPassword" class="required"></span>
        </label>
            <input type="submit" name="submit" value="Đổi mật khẩu " class="btnSubmit btn btn-info">
    </form>

<!--kết thúc form đổi mật khẩu-->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>





</body>
</html>

<!--scrip hien thi form sua mat khau-->
<script>
        $(document).ready(function() {
            $('a.login-window').click(function() {
                //lấy giá trị thuộc tính href - chính là phần tử "#login-box"
                var loginBox = $(this).attr('href');
         
                //cho hiện hộp đăng nhập trong 300ms
                $(loginBox).fadeIn(300);
         
                // thêm phần tử id="over" vào sau body
                $('body').append('<div id="over">');
                $('#over').fadeIn(300);
         
                return false;
         });
         // khi click đóng hộp thoại
         $(document).on('click', "a.close, #over", function() {
               $('#over, .login').fadeOut(300 , function() {
                   $('#over').remove();
               });
              return false;
         });
        });
</script>

<!--ket thuc scrip hien thi form sua mat khau-->


<!--scrip hien thi anh truoc khi update-->

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
<!--hide image cu-->
<script>
    $(".file").click(function(){
        $("#blah").show();
        $("#imgcsdl").hide();
    })
</script>
<!--ket thuc hide image cu -->

<!--ket thuc scrip hien thi anh truoc khi update-->


<!--scrip check validate form đổi password-->

<script>
        function validatePassword() {
        var currentPassword,newPassword,confirmPassword,output = true;
        
        currentPassword = document.frmChange.currentPassword;
        newPassword = document.frmChange.newPassword;
        confirmPassword = document.frmChange.confirmPassword;
        
        if(!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "không được trống";
        output = false;
        }
        else if(!newPassword.value) {
        newPassword.focus();
        document.getElementById("newPassword").innerHTML = "không được trống";
        output = false;
        }
        else if(!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "không được trống";
        output = false;
        }
        if(newPassword.value != confirmPassword.value) {
        newPassword.value="";
        confirmPassword.value="";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "không giống mật khẩu mới bạn vừa nhập";
        output = false;
        } 	
        return output;
        }
</script>
<!--kết thuc scrip check validate form đổi password-->
