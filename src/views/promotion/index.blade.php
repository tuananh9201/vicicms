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
                    <h4>Danh sách liên hệ</h4>
                </header>
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="{{url('/admin/promotion/insert')}}" id="editable-sample_new" class="btn btn-primary">
                                Thêm mới <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="pull-right">
                           <!--  <form action="{{-- {{url('/admin/contact/tim-kiem')}} --}}" method="post" accept-charset="utf-8" class="form-search">
                                {{-- {{ csrf_field() }} --}}
                                <input type="search" name="search" placeholder="Tìm theo tiêu đề" class="form-control">
                                <button type="submit" name="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form> -->
                        </div><!-- end: .pull-right -->
                    </div>
                    <div class="adv-table editable-table ">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">STT</th>
                                <th>Ưu đãi</th>
                                <th>Nội Dung</th>
                                {{-- <th>Nội dung</th> --}}
                                <th width="12%"></th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($promo as $km)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$km->name}}</td>
                                    <td>{!!str_limit($km->content,300,'...')!!}</td>
                                    <td>
                                        <a class="edit btn btn-success dropdown-toggle btn-xs" href="{{url('admin/promotion/edit',$km->id)}}"><i class="fa fa-pencil"></i>Sửa</a>
                                        <a class="delete btn btn-danger dropdown-toggle btn-xs" data-toggle="modal" href="{{url('admin/promotion/destroy',$km->id)}}" ><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
                                    </td>
                                </tr>
                             @endforeach

                              
                            </tbody>
                        </table>
                        {{$promo->links()}}
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