@extends('admin/master')

@section('content')
    <div class="modal fade" id="modalAddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Thêm Client App</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form1">Tên App</label>
                        <input type="text" id="form1" class="form-control validate">
                    </div>
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form2">Mail quản trị</label>
                        <input type="email" id="form2" class="form-control validate">
                    </div>
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form3">Callback URL</label>
                        <input type="email" id="form3" class="form-control validate">
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-success">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalUpdateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Chỉnh sửa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form1">Tên App</label>
                        <input type="text" id="form1" class="form-control validate">
                    </div>
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form2">Mail quản trị</label>
                        <input type="email" id="form2" class="form-control validate">
                    </div>
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form3">Callback URL</label>
                        <input type="email" id="form3" class="form-control validate">
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-success">Lưu</button>
                </div>
            </div>
        </div>
    </div>




<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header col-md-12">


                    <div class="col-md-4">
                        <div class="input-group-text">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <i class="nc-icon nc-zoom-split"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary"  data-toggle="modal" data-target="#modalAddForm" > Thêm App</button>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Ứng dụng
                            </th>
                            <th>
                                ID Ứng dụng
                            </th>
                            <th>
                                Callback URL
                            </th>
                            <th class="text-right">
                                Thao tác
                            </th>
                            </thead>
                            <tbody>

                            @foreach($app_list as $app)
                            <tr>
                                <td>
                                    {{$app->name_app}}
                                </td>
                                <td>
                                    {{ strval($app->id) }}
                                </td>
                                <td>
                                    {{$app->callback_url}}
                                </td>
                                <td class="text-right">
                                    <i class="nc-icon nc-ruler-pencil"></i>
                                    <a href="#modalUpdateForm">Sửa</a>
                                    <i class="nc-icon nc-simple-remove"></i>
                                    <a href="#modalUpdateForm">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row col-md-6 ml-auto">{{$app_list->links()}}</div>
                </div>
            </div>
        </div>

    </div>
    <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
            <div class="row">
                <nav class="footer-nav">

                </nav>

            </div>
        </div>
    </footer>
</div>


@endsection