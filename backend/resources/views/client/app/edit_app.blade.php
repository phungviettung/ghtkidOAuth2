<div class="editapp">
</div>
  <div class="dialogedit" id="editappContactForm" tabindex="-1" role="dialog" aria-labelledby="myeditappLabel"
aria-hidden="true">
  <div class="editapp-dialog" role="document">
    <form action="client/app/editapp/{{$getcl->id}}" method="POST">

      {{ csrf_field() }}
    <div class="editapp-content">
      <div class=" ghtk editapp-header text-center">
        <h4 class=" editapp-title w-100 font-weight-bold" style="color: #fff">Sửa App</h4>
        <button type="button" class="btclose close " data-dismiss="editapp" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="editapp-body mx-3">
        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="form34">ID App</label>
          <input type="text" name="name" id="form34" class="form-control" disabled value="{{$getcl->id}}">
        </div>
        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="form34">Name App</label>
          <input type="text" name="name" id="form34" class="form-control" value="{{$getcl->name_app}}">
        </div>

        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="form29">Callback URL</label>
          <input type="text" name="callback" id="form29" class="form-control" value="{{$getcl->callback_url}}">
        </div>

      </div>
      <div class="editapp-footer d-flex justify-content-center">
        <button class="ghtk btn btn-unique" style="margin-bottom: 30px;">Sửa</button>
      </div>
    </div>
  </form>
  </div>
</div>
