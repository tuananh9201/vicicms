@extends('vendor.ViciCMS.shared.layout')
@section('title', 'Admin Page')
@push('custom-style')
{{-- file-upload --}}
<link href="{{asset('admin/css/index/style.css')}}" rel="stylesheet"/>
@endpush
@section('content')
<script>
function showDiv(pageid)
{
   // alert(pageid);
   var linkaction=$('#prod'+pageid).val();
   $('#idxoa').val(linkaction);

   // alert($('#idxoa').val());
}
function Xoanha()
{
	$('#xoanhe').attr('href',$('#idxoa').val());
}
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body clearfix">
				<div class="row">
					Bạn có chắc chắn muốn xóa không ?
				</div><!-- end: .row -->

				<div class="row pull-right">
				
					{{-- <button class="btn btn-primary btn-xs" type="button">Có</button> --}}
					<a id="xoanhe" class="btn btn-primary btn-xs" href="#" onClick="Xoanha();">Có</a>
					<input type="hidden" name="idxoa" id="idxoa" value="">
					<button data-dismiss="modal" class="btn btn-danger btn-xs" type="button">Không</button>
				
				</div><!-- end: .row -->
			</div>
		</div>
	</div>
</div>
	<div class="row">
		{{-- @if (Session::has('message'))
			<div class= "alert-success">
				<h1>{!! Session::get('message') !!}</h1>
			</div>
		@endif --}}
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					<h4>Danh sách sản phẩm</h4>
				</header>
				<div class="panel-body">
					<div class="clearfix">
						<div class="btn-group">
						@if(Session::has('message'))
						<p class="alert alert-info">{{ Session::get('message') }}</p>
						@endif
							<a href="{{url('admin/product/insert')}}" id="editable-sample_new" class="btn btn-primary">
								Thêm mới <i class="fa fa-plus"></i>
							</a>
						</div>
						<div class="pull-right">
							<form action="{{url('admin/product/search')}}" method="post" accept-charset="utf-8" class="form-search">
								{{ csrf_field() }}
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
								<th>Hã sản xuất</th>
								<th>Tên sản phẩm</th>
								<th>Ảnh</th>
								<th>Giá</th>
								
								<th>Mô tả</th>
								<th width="12%"></th>
							</tr>
							</thead>
							<tbody>
							 @foreach($product as $key=>$sp)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$sp->relProductGroup->name}}</td>
									<td>{{$sp->relProvider->name}}</td>
									<td>{{$sp->name}}</td>
									
									<td>
									<img src="{{asset('images/sanpham/')}}/{{$sp->image}}" alt="{{$sp->name}}" width="150 px" height="150 px">
									<input type="hidden" name="prod" id="prod{{$key}}" value="{{url('admin/product/destroy',$sp->id)}}">
									</td>
									
									<td>{{number_format($sp->unitprice)}}</td>
									
									<td>{{$sp->shortDesc}}</td>
									<td>
										<a class="edit btn btn-success dropdown-toggle btn-xs" href="{{url('admin/product/edit',$sp->id)}}"><i class="fa fa-pencil"></i>Sửa</a>
										<a class="delete btn btn-danger dropdown-toggle btn-xs"  data-toggle="modal" id="myModal5" href="#myModal" href="{{url('/admin/product/destroy',$sp->id)}}" onClick="showDiv({{$key}});" ><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
									</td>
								</tr>
							 @endforeach

								
							</tbody>
						</table>
						{{$product->links()}}
					</div>
				</div>
			</section>
		</div>
	</div>
	<!-- page end-->
	</section>
	</div>
	
	@include('Admin.shared.modal-del')
@endsection