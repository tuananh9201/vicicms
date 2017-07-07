@extends('vendor.ViciCMS.shared.layout')
@section('title', 'Admin Page')
@push('styles')
{{-- file-upload --}}
<link href="{{asset('admin/js/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet"/>
@endpush
@push('custom-style')
{{-- file-upload --}}
<link href="{{asset('admin/css/infor/style.css')}}" rel="stylesheet"/>
@endpush
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					<h4>Sửa banner</h4>
				</header>
				<div class="panel-body">
					<form role="form" method="post" class="f1 clearfix" action="{{url('admin/banner/update',$slide->id)}}" enctype="multipart/form-data">
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
										<label for="banner">Banner</label>
									</div>

									<div class="col-md-5">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="pull-left">
												<div  class="fileupload-new thumbnail"  style="width: 560px; height: 230px;">
													<img name="imgs" id="imgs" src="{{asset('images/')}}/{{$slide->image}}" alt="" />
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
											</div><!-- end: .pull-left -->
											<div>
												 <span class="btn btn-white btn-file">
													 <input type="file" name="banner"/>
													 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
													 <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
												 </span>
											</div>
										</div>
									</div>
								</div>
							</div><!-- end: .form-group -->
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="caption">Caption</label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="caption" id="caption" value="{{$slide->caption}}" >
									</div>
								</div>
							</div><!-- end: .form-group -->
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="descript">Mô tả</label>
									</div>

									<div class="col-md-5">
										{{-- <input type="text" class="form-control" name="descript" id="descript" > --}}
										<textarea class="form-control"  name="descript">{{$slide->shortDesc}}</textarea>
									</div>
								</div>
							</div><!-- end: .form-group -->
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Chỉnh sửa</button>
									<button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Làm mới</button>
									<a href="{{url('admin/banner')}}" class="btn btn-danger"><i class="fa fa-times"></i> Thoát</a>
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