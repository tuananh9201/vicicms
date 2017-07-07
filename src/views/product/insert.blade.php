@extends('vendor.ViciCMS.shared.layout')
@section('title', 'Admin Page')
@push('styles')
{{-- file-upload --}}
{{-- <script src="{{asset('ckeditor/ckeditor/ckeditor.js')}}"></script> --}}

<!-- <script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script> -->
 <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script> 

<link href="{{asset('admin/js/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet"/>
@endpush
@section('content')
<script>
function getval()
{
    // alert($('#prodgrtype').val());
    // console.log();
    var state_id = $('#prodgrtype').val();
         $.get('{{ url('information') }}/create/ajax-state?state_id=' + state_id, function(data) {
            console.log(data);
            $('#provid').empty();
            $.each(data, function(index,subCatObj){
                $('#provid').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>');
            });
        });
}
</script>
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					<h4>Thêm sản phẩm</h4>
				</header>
				<div class="panel-body">
					<form role="form" method="post" class="f1 clearfix" action="{{url('admin/product/create')}}" enctype="multipart/form-data">
						{{ csrf_field() }}
						 <div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="producttype" >Loại sản phẩm :</label>
								</div>
								<div class="col-md-3">
									<select name="prodgrtype" id="prodgrtype" onchange="getval();" class="form-control" required >
									<option value="">--- Chọn loại sản phẩm ---</option>
									@foreach ($prodtype as $sploai)
									 <option value="{{$sploai->id}}">{{ $sploai->name }}</option>
									@endforeach						 
									</select>
								</div>
							</div>
						</div>
						<!-- end: .form-group -->
						 <div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="hansc" >Hãng sản xuất:</label>
								</div>
								<div class="col-md-3">
									<select name="provid" id="provid" required class="form-control" >
									<option value="">--- Chọn hãng sản xuất---</option>			 
									</select>
								</div>
							</div>
						</div>
						<!-- end: .form-group -->
						
						<div id="tiengViet" class="tab-pane fade in active">
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="title">Tên sản phẩm</label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="title" id="title" required >
									</div>
								</div>
							</div><!-- end: .form-group -->

							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="banner">Ảnh chi tiết sản phẩm</label>
									</div>

									<div class="col-md-5">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="pull-left">
												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
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
										<label for="oldPrice">Giá</label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="oldPrice" id="oldPrice" >
									</div>
								</div>
							</div>
							<!-- end: .form-group -->

							<!-- <div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="newPrice">Giá mới</label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="newPrice" id="newPrice" >
									</div>
								</div>
							</div> -->
							 <!-- end form-group -->

							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="baohanh">Chế độ bảo hành</label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="baohanh" id="baohanh" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="desc"> Mô tả sản phẩm</label>
									</div>

									<div class="col-md-5">
										<input type="text" class="form-control" name="shortDesc" id="shortDesc" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="desc"> Nội dung chi tiết sản phẩm</label>
									</div>

									<div class="col-md-9">
									 <textarea name="content1" id="content1"> Nội dung ở đây</textarea>
        							<script>
            						CKEDITOR.replace( 'content1',{
            							 filebrowserBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html',
            							 filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html?Type=Images',
            							 filebrowserUploadUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            							 filebrowserImageUploadUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            							 filebrowserWindowWidth : '1000',
            							 filebrowserWindowHeight : '700'
            						});
                                    </script>
									</div>
								</div>
							</div>

							<!-- end: .form-group -->
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</button>
									<button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Làm mới</button>
									<a href="{{url('admin/product')}}" class="btn btn-danger"><i class="fa fa-times"></i> Thoát</a>
								</div><!-- end: .col-sm-offset-2 -->
							</div>
						</div><!-- end: .form-group -->
					</form>
				</div>
			</section>
		</div>
			
	</div>

<!-- AJAX -->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="prodgrtype"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="hangsx"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="hangsx"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="hangsx"]').empty();
            }
        });
    });
</script> -->
							
							<!-- END AJAX -->
@endsection
@push('scripts')
{{-- file-upload --}}



<script src="{{asset('admin/js/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>


@endpush