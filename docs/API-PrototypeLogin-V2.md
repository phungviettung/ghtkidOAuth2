<!-- TOC -->

- [1. Request 1 - Khi Click Vào Login By GHTKID](#1-request-1---khi-click-vào-login-by-ghtkid)
    - [1.1. Form Đăng Nhập Khi User Chưa Login](#11-form-đăng-nhập-khi-user-chưa-login)
- [2. API Get User](#2-api-get-user)
- [3. Blog - Implement Callback Link](#3-blog---implement-callback-link)

<!-- /TOC -->

# 1. Request 1 - Khi Click Vào Login By GHTKID
--------------

Trên trình duyệt truy cập vào URL trên pattern và có 2 tình huống xảy ra

- Nếu end user chưa đăng nhập:
  - Hiện form đăng nhập lên
  - User đăng nhập thành công redirect về callback link có access token trên URL
- Nếu user đã đăng nhập:
  - Redirect luôn về callback link có access token trên URL

Lưu ý:
Validate app_id và callback link có hợp lệ hay không, chỉ redirect về callback link hợp lệ.

**Pattern**

```
GET /oauth2/oauth?appid=?&callback=?
```

- appid: id của ứng dụng đã được đăng ký trên trang quản trị của client
- callback: URL sẽ được redirect về sau khi end-user login thành công, URL phải khớp với app_id đã đăng ký trên hệ thống

**Request Sample**

```
GET https://id.ghtk.vn/oauth2/oauth?appid=abc123546&callback=https://blog.ghtk.vn/oauth_callback.php HTTP/1.1
```

**Response Sample**

- Trường hợp end user chưa đăng nhập hiệm form login - tham khảo 1.1
 
- Trường hợp end user đã đăng nhập redirect về callback link của application, trên URL có access token (có thể sử dụng để lấy được username)

```
HTTP/1.1 302 Found
Location: https://blog.ghtk.vn/oauth_callback.php?access_token=892734952834h523i45h2i34h59d

```


## 1.1. Form Đăng Nhập Khi User Chưa Login
--------------

Khi end-user nhấn vào Login By GHTKID, diaglog hiện lên, do chưa đăng nhập trên trình duyệt của end-user sẽ nhìn thấy form đăng nhập. Sau khi nhấn vào nút submit request sẽ được gửi lên server ghtk-id theo prototype dưới

**Pattern**

```
POST /oauth2/eu-login?app_id=?&callback=?

username=XXX&password=YYY
```

- app_id và callback phải trùng với **1.**
- username: username của end-user trên ghtk-id
- password: ....

**Request**

```
POST http://www.ghtkid.vn/oauth2/eu-login?appid=abc123546&callback=https://blog.ghtk.vn/oauth_callback.php HTTP/1.1
Host: www.ghtkid.vn
Content-length: 30
Content -Type: application/x-www-form-urlencoded
Authorization: No

username=tung&password=123
```

**Response**
Trường hợp thành công thì redirect về callback link của app_id
 
```
HTTP/1.1 302 Found
Location: https://blog.ghtk.vn/oauth_callback.php?access_token=892734952834h523i45h2i34h59d
```

# 2. API Get User
--------------------

Trả về tài khoản của end-user tương ưng với access token nếu token đó hợp lệ.

**Pattern**

```
GET /oauth2/getUser
Authorization: bearer XXX
```

**RequestSample**

```
GET /oauth2/getUser  HTTP/1.1
Authorization: bearer 892734952834h523i45h2i34h59d
```

**Response:**

Kết quả trả về ở dạng JSON chứa username của end-user 

```
HTTP/1.1 200 OK
Content-length: 66
Content -Type: application/json

{
  "success": true,
  "data": {
    "username": "tung"
  }
}
```

# 3. Blog - Implement Callback Link

Các bước xử lý:

1. Bóc tách URL lấy access_token
2. curl đến trang id.ghtk.vn theo **2.** (API getUser) để lấy thông tin user về
3. Nếu User lấy về được và tồn tại trong bảng end-users của blog thì tạo session cho người dùng 
4. Login thành công

**Prototype**

```
/oauth_callback.php?access_token=XXX
```

**Request Sample**:

```
/oauth_callback.php?access_token=892734952834h523i45h2i34h59d
```

**Response Sample**
Nếu get được user thành công thì tạo sesion => login => hiện trang nội dung của blog cho user đã đăng nhập

```
HTTP/1.1 200 OK
Content-length: 66
Content -Type: application/json
```