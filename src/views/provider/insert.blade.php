@extends('vendor.ViciCMS.shared.layout')
@section('title', 'Admin Page')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					<h4>Thêm nhóm sản phẩm</h4>
				</header>
				<div class="panel-body">
					<form role="form" method="post" class="f1 clearfix" action="{{url('admin/manufact/create')}}">
						{{ csrf_field() }}
						{{--<div class="form-group">--}}
						{{--<div class="row">--}}
						{{--<div class="col-md-3">--}}
						{{--<label for="productslug">Slug</label>--}}
						{{--</div>--}}

						{{--<div class="col-md-5">--}}
						{{--<input type="text" class="form-control" name="productslug" id="productslug" required>--}}
						{{--</div>--}}
						{{--</div>--}}
						{{--</div><!-- end: .form-group -->--}}
						
						<div id="tiengViet" class="tab-pane fade in active">
						<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="name">Nhóm sản phẩm </label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="productGname" value="{{$prodGroup->name}}"  disabled>
										<input type="hidden" name="productGID" value="{{$prodGroup->id}}">
									</div>
								</div>
							</div><!-- end: .form-group -->
						</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="name">Tên hãng sản xuất</label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="name" id="name" required>
									</div>
								</div>
							</div><!-- end: .form-group -->
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</button>
									<button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Làm mới</button>
									<a href="{{url('admin/product-group')}}" class="btn btn-danger"><i class="fa fa-times"></i> Thoát</a>
								</div><!-- end: .col-sm-offset-2 -->
							</div>
						</div><!-- end: .form-group -->
					</form>
				</div>
			</section>
		</div>
	</div>
@endsection
@push('scripts')
{{-- file-upload --}}
<script src="{{asset('admin/js/jquery-1.8.3.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
@endpush