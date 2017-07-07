$(document).ready(function(){
	addImg();

	$('#list-checkbox-size').css('opacity', '0');
	$('#list-checkbox-color').css('opacity', '0');
});

function addImg(){
	var para = null;
	para = $('#list-img .fileupload');
	var num = 0;
	var int = 0;

	para.each( function() {
		num = parseInt($(this).attr('id'));
	});
	int = num;

	$('#more-img').click(function(){
		int++;
		$('#list-img').append($('\
			<div class="fileupload fileupload-new clearfix" id="'+int+'" data-provides="fileupload">\
				<div class="pull-left">\
					<div class="fileupload-new thumbnail" style="width: 100px; height: 80px;">\
						<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />\
					</div>\
					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 80px; line-height: 20px;"></div>\
				</div>\
				<div class="group-btn-file">\
					 <span class="btn btn-white btn-file">\
						 <input type="file" name="'+int+'"/>\
						 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn ảnh</span>\
						 <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>\
					 </span>\
				</div>\
				<div class="btn-remove-fileupload" id="btn'+int+'" onclick="removeFileupload(this)">\
					<i class="fa fa-minus-circle"></i>\
				</div><!-- end: .btn-remove-fileupload -->\
			</div>\
		'));
	});
}

function removeFileupload(para){
	var btnNum = null;
	var numBtn = null;

	btnNum = $(para).attr('id');
	numBtn = btnNum.split('btn');
	$('#'+numBtn[1]).remove();
}

function showList(para){
	// $('#'+para).fadeIn();
	$('#'+para).css('opacity', '1');
}
function hideList(para){
	// $('#'+para).fadeOut();
	$('#'+para).css('opacity', '0');
}