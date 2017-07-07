@extends('vendor.ViciCMS.shared.layout')
@section('title', 'Admin Page')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					<h4>Thêm liên hệ</h4>
				</header>
				<div class="panel-body">
					<form role="form" method="post" class="f1 clearfix" action="{{url('admin/promotion/update',$promo->id)}}">
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
										<label for="customerName">Tên Ưu đãi</label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="name" id="name" required value="{{$promo->name}}" >
									</div>
								</div>
							</div><!-- end: .form-group -->

							{{-- <div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="email">Email</label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="email" id="email" >
									</div>
								</div>
							</div> --}}<!-- end: .form-group -->

							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="content">Nội dung</label>
									</div>

									<div class="col-md-9">
										<textarea class="form-control" name="content" id="content">{{$promo->content}}</textarea>
										<script>
            						CKEDITOR.replace( 'content',{
            							 filebrowserBrowseUrl: '../../../ckeditor/ckfinder/ckfinder.html',
            							 filebrowserImageBrowseUrl: '../../../ckeditor/ckfinder/ckfinder.html?Type=Images',
            							 filebrowserUploadUrl: '../../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            							 filebrowserImageUploadUrl: '../../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            							 filebrowserWindowWidth : '1000',
            							 filebrowserWindowHeight : '700'
            						});
                                    </script>
									</div>
								</div>
							</div><!-- end: .form-group -->
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Cập nhật</button>
									<button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Làm mới</button>
									<a href="{{url('admin/contact')}}" class="btn btn-danger"><i class="fa fa-times"></i> Thoát</a>
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
	<script src="{{asset('admin/js/ckeditor/ckeditor.js')}}"></script>
@endpush