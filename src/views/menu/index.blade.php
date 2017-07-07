@extends('vendor.ViciCMS.shared.layout')
@section('title', 'Admin Page')
@push('custom-style')
{{-- file-upload --}}
<link href="{{asset('admin/css/index/style.css')}}" rel="stylesheet"/>
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
                    <h4>Danh sách menu</h4>
                </header>
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="{{url('/admin/menu/insert')}}" id="editable-sample_new" class="btn btn-primary">
                                Thêm mới <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="pull-right">
                            <form action="{{-- {{url('/admin/menu/tim-kiem')}} --}}" method="post" accept-charset="utf-8" class="form-search">
                                {{-- {{ csrf_field() }} --}}
                                <input type="search" name="search" placeholder="Tìm theo tiêu đề" class="form-control">
                                <button type="submit" name="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- end: .pull-right -->
                    </div>
                    <div class="adv-table editable-table ">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">STT</th>
                                <th>menu</th>
                                <th>link</th>
                                <th width="15%"></th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($mn as $ban)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ban->name}}</td>
                                    <td>{{$ban->link}}</td>
                                    <td>
                                        <a class="edit btn btn-success dropdown-toggle btn-xs" href="{{route('admin.menu.edit',$ban->id)}}"><i class="fa fa-pencil"></i>Sửa</a>
                                        <a class="delete btn btn-danger dropdown-toggle btn-xs" data-toggle="modal" href="#myModal2" ><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
                                    </td>
                                </tr>
                             @endforeach

                           
                            </tbody>
                        </table>
                        {{-- {{$menu->links()}} --}}
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
    </section>
    </div>
    
{{--    @include('Admin.shared.modal-del')--}}
@endsection