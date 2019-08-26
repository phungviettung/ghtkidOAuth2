<div class="editapp">
</div>
  <div class=" dialogedit btnappbl" id="editappContactForm" tabindex="-1" role="dialog" aria-labelledby="myeditappLabel"
aria-hidden="true">
  <div class="editapp-dialog" role="document">
    <form action="client/app/delapp/{{$getcl->id}}" method="GET">

      {{ csrf_field() }}
    <div class="editapp-content">
      <div class=" ghtk editapp-header text-center">
        <h4 class=" editapp-title w-100 font-weight-bold" style="color: #fff">Get Buttom App: {{$getcl->id}}</h4>
        <button type="button" class="btclose close " data-dismiss="editapp" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="fix_btn " style="padding: 20px;">
          With:<input type="text"  class="form-control with" value="200">
          Height<input type="text" class="form-control height" value="40">
          Font-size<input type="text" class="form-control sizefont" value="18">
        
      </div>
      <div id="btnapplog" class="editapp-body mx-3" style="display: flex;justify-content: center;padding-bottom: 10px;">

            <a class="btnlog" href="{{$getcl->id}}" style=" background: #01904a;display: flex; justify-content: center;align-items: center;  color: #fff; border-radius: 5px;"><img src="http://giaohangtietkiem.vn/wp-content/uploads/2015/10/logo.png" alt="" style="width: 10%; margin-right: 10px;">  Login With GHTK </a> 

      </div>
      <div class="code" style="padding: 20px;">
        <p>Mã HTML:</p>
        <p class="codehtml"></p>
      </div>
      {{-- <div class="delapp-footer d-flex justify-content-center">
        <button class=" btn btn-danger" style="margin-bottom: 30px;">Xóa</button>
        <p class="btndel btn-secondary btn " style="margin-bottom: 30px;">Cancel</p> --}}
      </div>
    </div>
  </form>
  </div>
</div>
