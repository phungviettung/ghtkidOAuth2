**1.API kiểm tra Client có tồn tại không**

GET ghtkid.vn/login/oauth?id\_client=7777&amp;callback\_link=blog.org

Dữ liệu đầu vào

| Tham số | Bắt buộc | Mô tả |
| --- | --- | --- |
| Id\_client | có | Id của client khi đăng kí được cấpLà một số được tạo  và tồn tại duy nhất |
| Callback\_link | Có | Đường link để chuyển hướng ngược lại web client(blog.org) khi đã xác thực xongLà chuỗi string |

Dữ liệu trả về

| Tham số  | Mô tả |
| --- | --- |
| trace\_id | id Request (phục vụ quá trình fix lỗi) |

Request

```
GET ghtkid.vn/login/oauth?id_client=7777&callback_link=blog.org
```

Response :

HTTP Code: 200

{

success : true,

mess: &quot;Có tồn tại client&quot;,

}

 HTTP Code !=  200

{

success : false,

mess: &quot;Không tồn tại client&quot;,

trace\_id: &quot;xxxxxxxxxx&quot;

}

{

success : false,

mess: &quot;Định dạng API lỗi&quot;,

trace\_id: &quot;xxxxxxxxxx&quot;

}



**2.API lấy Access  token**

POST         ghtkid.vn/oauth

Dữ liệu đầu vào:

| Tham số | Bắt buộc | Mô tả |
| --- | --- | --- |
| Email | Có | Email của userString(được validate email) |
| Pass | Có | Mật khẩu của user sau khi mã hóaString |
| id\_client | có | Id của client khi đăng kí được cấpLà một số được tạo  và tồn tại duy nhất |
| callback\_link | Có | Đường link để chuyển hướng ngược lại web client(blog.org) khi đã xác thực xongLà chuỗi string |

Dữ liệu trả về

| Tham số | Mô tả |
| --- | --- |
| Token | Là 1 chuỗi ngẫu nhiên và duy nhấtString |
| trace\_id | id Request (phục vụ quá trình fix lỗi) |

Request

{

email : &quot; tungpv@ghtk.vn&quot;,

pass: &quot;sjshjixx\_sss &quot;,

id\_client: &quot;7777&quot; ,

callback\_link: &quot;blog.org&quot;

}

Response

HTTP Code: 200

{

success : true,

mess: &quot;user có tồn tại, lấy token thành công&quot;,

token: &quot; APITokenSample\_ca441e70288cB0515F310742&quot;

}

HTTP Code !=  200

{

success : false,

mess: &quot; user không tồn tại,lấy token không thành công &quot;,

token: &quot;&quot; ,

trace\_id: &quot;xxxxxxxxxx&quot;

}

{

success : false,

mess: &quot; sai định dạng tham số  &quot;,

token: &quot;&quot;

trace\_id: &quot;xxxxxxxxxx&quot;

}

**3.API GET thông tin end-user**

GET ghtkid.vn/api/getuser/email

Dữ liệu đầu vào:

| Tham số | Bắt buộc | Mô tả |
| --- | --- | --- |
| Token | Có | Là 1 chuỗi ngẫu nhiên và duy nhấtĐược gửi kèm trong headerString |

Dữ liệu đầu ra:

| Tham số | Mô tả |
| --- | --- |
| u\_email | Là email của user trong ghtkid.vnString |

Request:

HTTP Code: 302

{

token: &quot; APITokenSample\_ca441e70288cB0515F310742&quot;

}

Response:

HTTP Code: 200

{

success : true,

mess: &quot;lấy thông tin user thành công&quot;,

u\_email: &quot;tungpv@ghtk.vn&quot;

}

HTTP Code != 200

{

success : false,

mess: &quot; lấy thông tin user không thành công &quot;,

}

{

success : false,

mess: &quot;định dạng API sai &quot;,

}



**Activities**

**Chưa đăng nhập ghtkid.vn**

  1.           Người dùng truy cập blog.org

  2.           Blog.org hiển thị link &quot;đăng nhập bằng ghtkid&quot; với đường dẫn blog.org/auth

3.           Người dùng nhấn vào đây sẽ chuyển hướng đến ghtkid.vn/oauth?client\_id=7777&amp;callback\_link=blog.org để đăng nhập trên ghtkid.vn

4.           Hiển thị form đăng kí của ghtkid.vn

5.           Sau khi đăng nhập thành công thì sẽ chuyển hướng người dùng sang blog.org/callback

6.           Lúc này  blog.org thực hiện GET đến ghtkid.vn

 ghtkid.vn/api/getuser/email kèm theo mã token = APITokenSample\_ca441e70288cB0515F310742 được bọc trong header

7.       Blog.org đã lấy được thông tin tài khoản qua token =\&gt; lưu thông tin tài khoản vào session của mình và chuyển hướng ngược lại trang blog.org

**Tài khoản Đã đăng nhập trên ghtkid.vn**

1.           Người dùng truy cập blog.org

2.           Blog.org hiển thị link &quot;đăng nhập bằng ghtkid&quot; với đường dẫn blog.org/auth

3.           Người dùng nhấn vào đây sẽ chuyển hướng đến ghtkid.vn/oauth?client\_id=7777&amp;callback\_link=blog.org để đăng nhập trên ghtkid.vn

4.       Trong method GET ở trên check cookie xem user đã đăng nhập trên ghtkid.vn hay chưa(trong trường hợp này là rồi)

5.       Chuyển hướng người dùng sang blog.org/callback

6.           Lúc này  blog.org thực hiện GET đến ghtkid.vn

 ghtkid.vn/api/getuser/email kèm theo mã token= APITokenSample\_ca441e70288cB0515F310742 được bọc trong header

7.       Blog.org đã lấy được thông tin tài khoản qua token =\&gt; lưu thông tin tài khoản vào session của mình và chuyển hướng ngược lại trang blog.org
