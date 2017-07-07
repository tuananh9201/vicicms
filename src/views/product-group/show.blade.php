@extends('vendor.ViciCMS.shared.layout')
@section('title', 'Admin Page')
@push('custom-style')
{{-- file-upload --}}
<link href="{{asset('admin/css/index/style.css')}}" rel="stylesheet"/>
<style>
table, td, th {    
    border: 1px solid #ddd;
    text-align: center;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
</style>
@endpush
@section('content')
    <div class="row">
         @if (Session::has('message'))
            <div class= "alert-success">
                <h1>{!! Session::get('message') !!}</h1>
            </div>
        @endif 
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>Danh sách nhóm sản phẩm</h4>
                </header>
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="{{url('/admin/product-group/insert')}}" id="editable-sample_new" class="btn btn-primary">
                                Thêm mới <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        {{-- <div class="pull-right">
                            <form action="" method="post" accept-charset="utf-8" class="form-search">
                                {{ csrf_field() }}
                                <input type="search" name="search" placeholder="Tìm theo tiêu đề" class="form-control">
                                <button type="submit" name="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div> --}}
                    </div>
                    <div class="adv-table editable-table ">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">STT</th>
                                <th>Nhóm sản phẩm</th>
                                <th width="15%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prodGroup as $nhom)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$nhom->name}}</td>
                                <td>
                                    <a class="edit btn btn-success dropdown-toggle btn-xs" href="{{url('admin/product-group/edit',$nhom->id)}}"><i class="fa fa-pencil"></i>Sửa</a>
                                    <a class="delete btn btn-danger dropdown-toggle btn-xs" data-toggle="modal" href="{{url('admin/product-group/destroy',$nhom->id)}}" ><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
                                </td>
                                 </tr>
                                @endforeach
                           
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
    </section>
    </div>
    
    {{-- @include('Admin.shared.modal-del') --}}
@endsection