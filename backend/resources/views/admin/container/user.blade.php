@extends('admin/master')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="col-md-4">

                            <div class="input-group-text">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <i class="nc-icon nc-zoom-split"></i>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Mail người dùng
                                </th>
                                <th>
                                    Tình trạng hoạt động
                                </th>
                                <th>
                                    Ngày tạo
                                </th>
                                <th class="text-right">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody>
                                @foreach($user_list as $user)
                                <tr>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->status}}
                                    </td>
                                    <td>
                                        {{$user->created_at}}
                                    </td>
                                    <td class="text-right">
                                        <i class="nc-icon nc-ruler-pencil"></i>
                                        <a href="https://www.lazada.vn">Sửa</a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="row col-md-6 ml-auto">{{$user_list->links()}}</div>
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