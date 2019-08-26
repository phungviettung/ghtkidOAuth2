@extends('client.layout.client')
@section('getcontent')

<style>
.pagination {
  display: inline-block;
}

.pagination li {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a {
  padding: 10px;
}

.pagination a:hover{
  background-color: #4CAF50;
  border-radius: 5px;
  color: white;
  padding: 10px;
}

</style>

<div class="row">
<div class="col-md-12">
  <div class="card">
    <div class="card-header col-md-12">
      <div class="col-md-8">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    <strong>{{$err}}</strong><br/>
                @endforeach
            </div>
        @endif
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="client/app/addapp" method="POST">

              {{ csrf_field() }}
            <div class="modal-content">
              <div class=" ghtk modal-header text-center">
                <h4 class=" modal-title w-100 font-weight-bold" style="color: #fff;margin-top: 0px;">Thêm App</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <label data-error="wrong" data-success="right" for="form34">Name App</label>
                  <input type="text" name="name" id="form34" class="form-control">
                </div>

                <div class="md-form mb-5">
                  <label data-error="wrong" data-success="right" for="form29">Callback URL</label>
                  <input type="text" name="callback" id="form29" class="form-control">
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="ghtk btn btn-unique">Đăng ký</button>
              </div>
            </div>
          </form>
          </div>
        </div>
        


        <div class="">
          <a href="" class="btnghtk btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Thêm App</a>
        </div>
      </div>

    </div>
    <div class="card-body">
      <div class="table">
        <table class="table">
          <thead style="color: #01904a;">
            <th>
              ID Ứng dụng
            </th>
            <th>
              Ứng dụng
            </th>
            <th class="ip">
              Callback URL
            </th>
            <th class="ip">
              ngày tạo
            </th>
            <th>
             Thao tác
            </th>
            <th class="ip">
              Get bottom Login
            </th>
          </thead>
          <tbody>
            @foreach($listApp as $app)
            <tr>
              <td>
                {{ $app->id }}
              </td>
              <td>
                {{$app->name_app}}
              </td >
              <td class="ip" style="max-width: 200px">
                {{$app->callback_url}}
              </td>
              <td class="ip">
                {{$app->created_at}}
              </td>
              <td>
                <button class="btnedit btn btn-info" idapp="{{$app->id}}">edit</button>
                <button class="btndel btn btn-danger" idapp="{{$app->id}}">delete</button>
                <button class="pc btnapp btnghtk btn btn-primary" idapp="{{$app->id}}">Create Buttom</button>
              </td>
              <td class="ip">
                <button class="btnapp btnghtk btn btn-primary" idapp="{{$app->id}}">Create Buttom</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! $listApp->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection
