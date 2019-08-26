<div class="editapp">
</div>
  <div class="dialogedit" id="editappContactForm" tabindex="-1" role="dialog" aria-labelledby="myeditappLabel"
aria-hidden="true">
  <div class="editapp-dialog" role="document">
    <form action="client/app/delapp/{{$getcl->id}}" method="GET">

      {{ csrf_field() }}
    <div class="editapp-content">
      <div class=" ghtk editapp-header text-center">
        <h4 class=" editapp-title w-100 font-weight-bold" style="color: #fff">Delete App: {{$getcl->id}}</h4>
        <button type="button" class="btclose close " data-dismiss="editapp" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="editapp-body mx-3">
        

      </div>
      <div class="delapp-footer d-flex justify-content-center">
        <button class=" btn btn-danger" style="margin-bottom: 30px;">Xóa</button>
        <p class="btndel btn-secondary btn " style="margin-bottom: 30px;">Cancel</p>
      </div>
    </div>
  </form>
  </div>
</div>
