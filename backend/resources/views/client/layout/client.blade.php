<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="client_asset/img/apple-icon.png">
  <link rel="icon" type="image/png" href="client_asset/img/icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    OAuth2 GHTK
  </title>
  <base href="{{ asset('') }}">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c2b2e8d3c4.js"></script>
  <!-- CSS Files -->
  <link href="client_asset/css/bootstrap.min.css" rel="stylesheet" />
  <link href="client_asset/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="client_asset/demo/demo.css" rel="stylesheet" />
  <link href="client_asset/css/style.css" rel="stylesheet" />

</head>

<body class="">

 <div class="edit"></div>
 <div class="del"></div>
 <div class="app"></div>
   <div class="wrapper ">
    
    @include('client.layout.side_bar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('client.layout.nav_bar')
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->
      <div class="content">
        @yield('getcontent')
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="https://www.giaohangtietkiem.com" target="_blank">GHTK.VN</a>
                </li>
                
              </ul>
            </nav>

          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="client_asset/js/core/jquery.min.js"></script>
  <script src="client_asset/js/core/popper.min.js"></script>
  <script src="client_asset/js/core/bootstrap.min.js"></script>
  <script src="client_asset/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  <!-- Chart JS -->
  <script src="client_asset/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="client_asset/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="client_asset/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="client_asset/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      function getBtn(){
        var withbtn = $(".with").val();
        var heightbtn = $(".height").val();
        var sizefont = $(".sizefont").val();
        $(".btnlog").css({
            width: withbtn,
            fontSize: sizefont+"px",
            height: heightbtn
        });
        var codeHtml= $("#btnapplog").html();
        $(".codehtml").text(codeHtml+"");
      }


      $(".btnedit").click(function() {
        var idapp=$(this).attr('idapp');
          $.ajax({

                  url : "client/app/geteditapp",
                  type : "get",
                  dataType:"html",
                  data : {
                    idapp : idapp
                  },
                  success : function (result){
                      $('.edit').html(result);
                       $(".close").click(function() {
                              $('.edit').html('');
                         });
                       $(document).keyup(function(e) {
                        if (e.keyCode == 27) {
                          $('.edit').html('');
                        }   
                      });
                    }
              });       
        });
      $(".btndel").click(function() {
        var idapp=$(this).attr('idapp');
          $.ajax({

                  url : "client/app/getdelapp",
                  type : "get",
                  dataType:"html",
                  data : {
                    idapp : idapp
                  },
                  success : function (result){
                      $('.del').html(result);
                       $(".close").click(function() {
                              $('.del').html('');
                         });
                       $(".btndel").click(function() {
                              $('.del').html('');
                         });
                       $(document).keyup(function(e) {
                        if (e.keyCode == 27) {
                          $('.del').html('');
                        }   
                      });
                    }
              });       
        });
      $(".btnapp").click(function() {
        var idapp=$(this).attr('idapp');
          $.ajax({

                  url : "client/app/getbtnapp",
                  type : "get",
                  dataType:"html",
                  data : {
                    idapp : idapp
                  },
                  success : function (result){
                      $('.app').html(result);
                       $(".close").click(function() {
                              $('.app').html('');
                         });
                        getBtn();
                        $(".with").change(function(){
                          getBtn();
                        });
                        $(".height").change(function(){
                          getBtn();
                        });
                        $(".sizefont").change(function(){
                          getBtn();
                        });
                       $(document).keyup(function(e) {
                        if (e.keyCode == 27) {
                          $('.app').html('');
                        }   
                      });
                    }
              });       
        });
      

    });
  </script>
</body>

</html>
