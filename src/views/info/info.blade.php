@extends('vendor.ViciCMS.shared.layout')
@section('title', 'Admin Page')
@push('styles')
{{-- file-upload --}}
<link href="{{asset('admin/js/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet"/>
{{-- <script src="{{asset('admin/ckeditor/ckeditor/ckeditor.js')}}"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script> --}}

@endpush
@push('custom-style')
<link href="{{asset('admin/css/infor/style.css')}}" rel="stylesheet"/>
@endpush
@section('content')

	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					Chỉnh sửa thông tin 
					<span class="tools pull-right">
						<a href="javascript:" class="fa fa-chevron-down"></a>
					</span>
				
				</header>
				<div class="panel-body">
					<form role="form" method="post" class="f1 clearfix" id="vnForn" action="{{url('admin/infor/update')}}" enctype="multipart/form-data">
					{{--<form role="form" method="post" class="f1 clearfix" id="vnForn" enctype="multipart/form-data">--}}
						 {{ csrf_field() }} 
						 <div class ="col-md-12">
						 	@if (Session::has('message'))
						 		<div class= "alert-success">
						 			<h3>{!! Session::get('message') !!}</h3>
						 		</div>
						 	@endif
						 </div> 
						<ul class="nav nav-tabs">
							<li id="tabMenu1" class="active"><a data-toggle="tab" href="#menu1">Thông tin</a></li>
							<li id="tabMenu2"><a data-toggle="tab" href="#menu2">Logo</a></li>
							<li id="tabMenu3"><a data-toggle="tab" href="#menu3">SEO-Giới thiệu</a></li>
							<li id="tabMenu3"><a data-toggle="tab" href="#menu4">Trả góp</a></li>
						</ul>

						<div class="tab-content">
							<div id="menu1" class="tab-pane fade in active">
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="companyName">Tên website</label>
										</div>

									<div class="col-md-5">
											<input type="text" class="form-control" name="companyName" id="companyName" value="{{$info->websitename}}">
										</div>
									</div>
								</div><!-- end: .form-group -->

								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="address">Địa chỉ</label>
										</div>

										<div class="col-md-5">
											<input type="text" class="form-control" name="address" id="address" value=" {{$info->address}}">
										</div>
									</div>
								</div><!-- end: .form-group -->

								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="phone">Số điện thoại</label>
										</div>

										<div class="col-md-5">
											<input type="text" class="form-control" rangelength="[7,11]" name="phone" id="phone" value="{{$info->phone}}">
										</div>
									</div>
								</div><!-- end: .form-group -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="fax">Fax</label>
										</div>

										<div class="col-md-5">
											<input type="text" class="form-control" rangelength="[7,11]" name="fax" id="fax" value="{{$info->fax}}">
										</div>
									</div>
								</div><!-- end: .form-group -->

								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="phone">Hotline</label>
										</div>

										<div class="col-md-5">
											<input type="text" class="form-control" rangelength="[7,11]" name="hotline" id="hotline" value="{{$info->hotline}}">
										</div>
									</div>
								</div><!-- end: .form-group -->

								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="email">Email</label>
										</div>

										<div class="col-md-5">
											<input type="email" class="form-control" name="email" id="email" value="{{$info->email}}">
										</div>
									</div>
								</div><!-- end: .form-group -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="boss">Đại diện bán hàng</label>
										</div>

										<div class="col-md-5">
											<input type="text" required class="form-control" name="boss" id="boss" value="{{$info->boss}}">
										</div>
									</div>
								</div><!-- end: .form-group -->
							</div>
							<div id="menu2" class="tab-pane fade">
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="linkfb">Logo trái</label>
										</div>

										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="pull-left">
												<div  class="fileupload-new thumbnail"  style="width: 200px; height: 150px;">
													<img name="imgs" id="imgs" src="{{asset('/images/')}}/{{$info->logoLeft}}" alt="" />
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
											</div><!-- end: .pull-left -->
											<div>
												 <span class="btn btn-white btn-file">
													 <input type="file" name="image1"/>
													 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
													 <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
												 </span>
											</div>
										</div>
									</div>
								</div><!-- end: .form-group -->
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="linkfb">Logo phải</label>
										</div>

										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="pull-left">
												<div  class="fileupload-new thumbnail"  style="width: 200px; height: 150px;">
													<img name="imgs2" id="imgs2" src="{{asset('/images/')}}/{{$info->logoRight}}" alt="" />
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
											</div><!-- end: .pull-left -->
											<div>
												 <span class="btn btn-white btn-file">
													 <input type="file" name="image2"/>
													 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>
													 <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
												 </span>
											</div>
										</div>
									</div>
								</div><!-- end: .form-group -->

								{{-- <div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="linkgg">Google link</label>
										</div>

										<div class="col-md-5">
											<input type="url" class="form-control" name="linkgg" id="linkgg" value="">
										</div>
									</div>
								</div><!-- end: .form-group -->

								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="linkyoutube">Youtube link</label>
										</div>

										<div class="col-md-5">
											<input type="url" class="form-control" name="linkyoutube" id="linkyoutube" value="">
										</div>
									</div>
								</div><!-- end: .form-group --> --}}
							</div>
							<div id="menu3" class="tab-pane fade">
								<div class="form-group">
									<div class="row">
										<div class="col-md-2">
											<label for="seokey">Từ khóa SEO</label>
										</div>

										<div class="col-md-5">
											<input type="text" class="form-control" name="seokey" id="seokey" value="{{$info->keywordseo}}">
										</div>
									</div>
								</div><!-- end: .form-group -->

								<div class="form-group">
									<div class="row">
										<div class="col-md-2">
											<label for="seotitle">Tiêu đề SEO</label>
										</div>

										<div class="col-md-5">
											<input type="text" class="form-control" name="seotitle" id="seotitle" value="{{$info->titleseo}}">
										</div>
									</div>
								</div><!-- end: .form-group -->

								<div class="form-group">
									<div class="row">
										<div class="col-md-2">
											<label for="content1">Giới thiệu</label>
										</div>

										<div class="col-md-10">
											<textarea class="form-control" name="content1" id="content1">{{$info->about}}</textarea>
											<script type="text/javascript">
            						CKEDITOR.replace( 'content1',{
            							 filebrowserBrowseUrl: '../ckeditor/ckfinder/ckfinder.html',
            							 filebrowserImageBrowseUrl: '../ckeditor/ckfinder/ckfinder.html?Type=Images',
            							 filebrowserUploadUrl: '../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            							 filebrowserImageUploadUrl: '../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            							 filebrowserWindowWidth : '1000',
            							 filebrowserWindowHeight : '700'
            						});
                                    </script>
										</div>
									</div>
								</div><!-- end: .form-group -->

								
						</div>
							<div id="menu4" class="tab-pane fade">
								<div class="form-group">
									<div class="row">
										<div class="col-md-2">
											<label for="content1">Trả góp</label>
										</div>

										<div class="col-md-10">
											<textarea class="form-control" name="content2" id="content2">{{$info->tragop}}</textarea>
											<script type="text/javascript">
                                                CKEDITOR.replace( 'content2',{
                                                    filebrowserBrowseUrl: '../ckeditor/ckfinder/ckfinder.html',
                                                    filebrowserImageBrowseUrl: '../ckeditor/ckfinder/ckfinder.html?Type=Images',
                                                    filebrowserUploadUrl: '../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                    filebrowserImageUploadUrl: '../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                    filebrowserWindowWidth : '1000',
                                                    filebrowserWindowHeight : '700'
                                                });
											</script>
										</div>
									</div>
								</div><!-- end: .form-group -->


							</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success">Cập nhật</button>
								<button type="reset" class="btn btn-danger">Làm mới</button>
							</div><!-- end: .col-sm-offset-2 -->
						</div>
					</form><!-- end: .f1 -->
				</div><!-- end: .panel-body -->
			</section>
		</div><!-- end: .col-md-12 -->
	</div>
@endsection
@push('scripts')
{{-- file-upload --}}
{{-- <script src="{{asset('admin/js/jquery-1.8.3.min.js')}}"></script> --}}
<script src="{{asset('admin/js/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>

	
@endpush