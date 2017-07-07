(function ($) {
	"use strict";
	$(document).ready(function () {
		/*==Left Navigation Accordion ==*/
		if ($.fn.dcAccordion) {
			$('#nav-accordion').dcAccordion({
				eventType: 'click',
				autoClose: true,
				saveState: true,
				disableLink: true,
				speed: 'slow',
				showCount: false,
				autoExpand: true,
				classExpand: 'dcjq-current-parent'
			});
		}
		/*==Slim Scroll ==*/
		if ($.fn.slimScroll) {
			$('.event-list').slimscroll({
				height: '305px',
				wheelStep: 20
			});
			$('.conversation-list').slimscroll({
				height: '360px',
				wheelStep: 35
			});
			$('.to-do-list').slimscroll({
				height: '300px',
				wheelStep: 35
			});
		}
		/*==Nice Scroll ==*/
		if ($.fn.niceScroll) {


			$(".leftside-navigation").niceScroll({
				cursorcolor: "#1FB5AD",
				cursorborder: "0px solid #fff",
				cursorborderradius: "0px",
				cursorwidth: "3px"
			});

			$(".leftside-navigation").getNiceScroll().resize();
			if ($('#sidebar').hasClass('hide-left-bar')) {
				$(".leftside-navigation").getNiceScroll().hide();
			}
			$(".leftside-navigation").getNiceScroll().show();

			$(".right-stat-bar").niceScroll({
				cursorcolor: "#1FB5AD",
				cursorborder: "0px solid #fff",
				cursorborderradius: "0px",
				cursorwidth: "3px"
			});

		}

		/*==Easy Pie chart ==*/
		if ($.fn.easyPieChart) {

			$('.notification-pie-chart').easyPieChart({
				onStep: function (from, to, percent) {
					$(this.el).find('.percent').text(Math.round(percent));
				},
				barColor: "#39b6ac",
				lineWidth: 3,
				size: 50,
				trackColor: "#efefef",
				scaleColor: "#cccccc"

			});

			$('.pc-epie-chart').easyPieChart({
				onStep: function(from, to, percent) {
					$(this.el).find('.percent').text(Math.round(percent));
				},
				barColor: "#5bc6f0",
				lineWidth: 3,
				size:50,
				trackColor: "#32323a",
				scaleColor:"#cccccc"

			});

		}

		/*== SPARKLINE==*/
		if ($.fn.sparkline) {

			$(".d-pending").sparkline([3, 1], {
				type: 'pie',
				width: '40',
				height: '40',
				sliceColors: ['#e1e1e1', '#8175c9']
			});



			var sparkLine = function () {
				$(".sparkline").each(function () {
					var $data = $(this).data();
					($data.type == 'pie') && $data.sliceColors && ($data.sliceColors = eval($data.sliceColors));
					($data.type == 'bar') && $data.stackedBarColor && ($data.stackedBarColor = eval($data.stackedBarColor));

					$data.valueSpots = {
						'0:': $data.spotColor
					};
					$(this).sparkline($data.data || "html", $data);


					if ($(this).data("compositeData")) {
						$spdata.composite = true;
						$spdata.minSpotColor = false;
						$spdata.maxSpotColor = false;
						$spdata.valueSpots = {
							'0:': $spdata.spotColor
						};
						$(this).sparkline($(this).data("compositeData"), $spdata);
					};
				});
			};

			var sparkResize;
			$(window).resize(function (e) {
				clearTimeout(sparkResize);
				sparkResize = setTimeout(function () {
					sparkLine(true)
				}, 500);
			});
			sparkLine(false);
		}

		if ($.fn.plot) {
			var datatPie = [30, 50];
			// DONUT
			$.plot($(".target-sell"), datatPie, {
				series: {
					pie: {
						innerRadius: 0.6,
						show: true,
						label: {
							show: false

						},
						stroke: {
							width: .01,
							color: '#fff'
						}
					}
				},

				legend: {
					show: true
				},
				grid: {
					hoverable: true,
					clickable: true
				},

				colors: ["#ff6d60", "#cbcdd9"]
			});
		}

		/*==Collapsible==*/
		$('.widget-head').click(function (e) {
			var widgetElem = $(this).children('.widget-collapse').children('i');

			$(this)
				.next('.widget-container')
				.slideToggle('slow');
			if ($(widgetElem).hasClass('ico-minus')) {
				$(widgetElem).removeClass('ico-minus');
				$(widgetElem).addClass('ico-plus');
			} else {
				$(widgetElem).removeClass('ico-plus');
				$(widgetElem).addClass('ico-minus');
			}
			e.preventDefault();
		});

		/*==Sidebar Toggle==*/

		$(".leftside-navigation .sub-menu > a").click(function () {
			var o = ($(this).offset());
			var diff = 80 - o.top;
			if (diff > 0)
				$(".leftside-navigation").scrollTo("-=" + Math.abs(diff), 500);
			else
				$(".leftside-navigation").scrollTo("+=" + Math.abs(diff), 500);
		});



		$('.sidebar-toggle-box .fa-bars').click(function (e) {

			$(".leftside-navigation").niceScroll({
				cursorcolor: "#1FB5AD",
				cursorborder: "0px solid #fff",
				cursorborderradius: "0px",
				cursorwidth: "3px"
			});

			$('#sidebar').toggleClass('hide-left-bar');
			if ($('#sidebar').hasClass('hide-left-bar')) {
				$(".leftside-navigation").getNiceScroll().hide();
			}
			$(".leftside-navigation").getNiceScroll().show();
			$('#main-content').toggleClass('merge-left');
			e.stopPropagation();
			if ($('#container').hasClass('open-right-panel')) {
				$('#container').removeClass('open-right-panel')
			}
			if ($('.right-sidebar').hasClass('open-right-bar')) {
				$('.right-sidebar').removeClass('open-right-bar')
			}

			if ($('.header').hasClass('merge-header')) {
				$('.header').removeClass('merge-header')
			}


		});
		$('.toggle-right-box .fa-bars').click(function (e) {
			$('#container').toggleClass('open-right-panel');
			$('.right-sidebar').toggleClass('open-right-bar');
			$('.header').toggleClass('merge-header');

			e.stopPropagation();
		});

		$('.header,#main-content,#sidebar').click(function () {
			if ($('#container').hasClass('open-right-panel')) {
				$('#container').removeClass('open-right-panel')
			}
			if ($('.right-sidebar').hasClass('open-right-bar')) {
				$('.right-sidebar').removeClass('open-right-bar')
			}

			if ($('.header').hasClass('merge-header')) {
				$('.header').removeClass('merge-header')
			}
		});
		$('.panel .tools .fa').click(function () {
			var el = $(this).parents(".panel").children(".panel-body");
			if ($(this).hasClass("fa-chevron-down")) {
				$(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
				el.slideUp(200);
			} else {
				$(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
				el.slideDown(200); }
		});
		$('.panel .tools .fa-times').click(function () {
			$(this).parents(".panel").parent().remove();
		});

	});
})(jQuery);

function checkTab($tab){
	if($tab==1){
		$('.f1 .nav li').removeClass('active');
		$('#tabMenu1').addClass('active');
		$('.f1 .tab-content .fade').removeClass('in active');
		$('#menu1').addClass('in active')
	} else if($tab==2) {
		$('.f1 .nav li').removeClass('active');
		$('#tabMenu2').addClass('active');
		$('.f1 .tab-content .fade').removeClass('in active');
		$('#menu2').addClass('in active')
	} else if($tab==3){
		$('.f1 .nav li').removeClass('active');
		$('#tabMenu3').addClass('active');
		$('.f1 .tab-content .fade').removeClass('in active');
		$('#menu3').addClass('in active')
	}
}

function checkReg($var, $reg, $str, $tab){
	var txtE = $($var).val();

	checkTab($tab);
	if($reg.test(txtE)==false){
		alert($str+' sai định dạng!');
		$($var).select();
		return false;
	}
	return true;
}
function checkEmpty($element, $str, $tab){
	var txtE = $($element).val();

	checkTab($tab);
	if(txtE==""){
		alert($str+' không được rỗng');
		$($element).focus();
		return false;
	}
	return true;
}

$(document).ready(function(){
	$('#hotelForm').submit(function(){
		phoneReg = /^[0-9-+]+$/;
		emailReg = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		urlReg = /^http(s)?:\/\/(www\.)?\w+\.\w+$/;

		if(checkEmpty('#companyname', 'Tên công ty', 1)==false) return false;
		if(checkEmpty('#address', 'Địa chỉ', 1)==false) return false;
		if(checkEmpty('#infophone', 'Số điện thoại', 1)==false) return false;
		if(checkReg('#infophone', phoneReg, 'Số điện thoại', 1)==false) return false;
		if(checkEmpty('#infofax', 'Fax', 1)==false) return false;
		if(checkReg('#infofax', phoneReg, 'Fax', 1)==false) return false;
		if(checkEmpty('#infoemail', 'Email', 1)==false) return false;
		if(checkReg('#infoemail', emailReg, 'Email', 1)==false) return false;
		if(checkEmpty('#infoskype', 'Skype', 1)==false) return false;
		if(checkEmpty('#infowebname', 'Tên website', 1)==false) return false;
		if(checkEmpty('#linkfb', 'Facebook link', 2)==false) return false;
		if(checkReg('#linkfb', urlReg, 'Facebook link', 2)==false) return false;
		if(checkEmpty('#linkgg', 'Google link', 2)==false) return false;
		if(checkReg('#linkgg', urlReg, 'Google link', 2)==false) return false;
		if(checkEmpty('#linkyoutube', 'Youtube link', 2)==false) return false;
		if(checkReg('#linkyoutube', urlReg, 'Youtube link', 2)==false) return false;
		if(checkEmpty('#seokey', 'Từ khóa SEO', 3)==false) return false;
		if(checkEmpty('#seotitle', 'Tiêu đề SEO', 3)==false) return false;
	});
});

function ChangeToSlug()
{
	var title, slug;
	title = document.getElementById('title').value;

	slug = title.toLowerCase();

	slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
	slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
	slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
	slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
	slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
	slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
	slug = slug.replace(/đ/gi, 'd');
	slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
	slug = slug.replace(/ /gi, '-');
	slug = slug.replace(/\-\-\-\-\-/gi, '-');
	slug = slug.replace(/\-\-\-\-/gi, '-');
	slug = slug.replace(/\-\-\-/gi, '-');
	slug = slug.replace(/\-\-/gi, '-');
	slug = '@' + slug + '@';
	slug = slug.replace(/\@\-|\-\@|\@/gi, '');
	document.getElementById('slug').value = slug;
}

// $('#save_value').click(function(){
// 	var val = [];
// 	$(':checkbox:checked').each(function(i){
// 		val[i] = $(this).val();
// 	});
// });

$(document).ready(function(){
	// $('#editcustomerForm').submit(function(){
	// 	if(checkEmpty('#customername', 'Tên khách hàng', 0)==false) return false;
	// 	if(checkEmpty('#customerpicture', 'Ảnh', 0)==false) return false;
	// }
	// $('#editcustomerForm').validate();
	// $("[name='my-checkbox']").bootstrapSwitch();
});