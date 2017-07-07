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
                <h3>{!! Session::get('message') !!}</h3>
            </div>
     @endif 
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>Danh sách banner</h4>
                </header>
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="btn-group">
                       
                            <a href="{{url('admin/banner/insert')}}" id="editable-sample_new" class="btn btn-primary">
                                Thêm mới <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="pull-right">
                           
                        </div><!-- end: .pull-right -->
                    </div>
                    <div class="adv-table editable-table ">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">STT</th>
                                <th>Banner</th>
                                 <th>Caption</th>
                                  <th>Mô tả</th>
                                <th width="15%"></th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($slide as $sli)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('images/')}}/{{$sli->image}}" alt="{{$sli->description}}"></td>
                                    <td>{{$sli->caption}}</td>
                                    <td>{{$sli->shortDesc}}</td>
                                    <td>
                                        <a class="edit btn btn-success dropdown-toggle btn-xs" href="{{url('admin/banner/edit',$sli->id)}}"><i class="fa fa-pencil"></i>Sửa</a>
                                        <a class="delete btn btn-danger dropdown-toggle btn-xs" data-toggle="modal" href="{{url('admin/banner/destroy',$sli->id)}}" ><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{-- {{$banners->links()}} --}}
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