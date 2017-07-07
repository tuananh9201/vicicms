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
                    <h4>Danh sách hãng sản xuất</h4>
                </header>
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="{{url('/admin/product-group/insert')}}" id="editable-sample_new" class="btn btn-primary">
                                Thêm mới <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="pull-right">
                            <form action="{{-- {{url('/admin/product-group/tim-kiem')}} --}}" method="post" accept-charset="utf-8" class="form-search">
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
                                <th>Nhóm sản phẩm</th>
                                 <th>Hãng sản xuất</th>
                            </tr>
                            </thead>
                            <tbody>
                              @for($i=0;$i < count($prodGroup);$i++)
                              <tr>
                                  <th rowspan="{{count($collection[$i])+3}}">{{$i +1}}</th>
                                </tr>
                                <tr>
                                  <th  rowspan="{{count($collection[$i])+2}}">{{$prodGroup[$i]->name}}</th>
                                </tr>
                                @for($j=0;$j < count($collection[$i]);$j++)
                                <tr>
                                    <td>{{$collection[$i][$j]['name']}}
                                    <a class="delete btn btn-danger dropdown-toggle btn-xs" data-toggle="modal" href="{{url('admin/manufact/destroy',$collection[$i][$j]['id'])}}" ><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
                                    </td>
                                </tr>
                                @endfor
                                <tr> 
                                     <td><a class="add btn btn-success dropdown-toggle btn-xs" href="{{url('/admin/manufact/insert',$prodGroup[$i]->id)}}"><i class="fa fa-plus"></i>Thêm mới</a></td>
                                     </tr>
                                  
                             @endfor
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