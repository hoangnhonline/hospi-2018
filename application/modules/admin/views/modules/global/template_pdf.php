<!DOCTYPE html>
<html ng-app="phptravelsApp">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="HOSPI">
	<meta property="fb:app_id" content="159189514584032"/>
	<title>Novotel Phú Quốc Resort</title>
	<link rel="shortcut icon" href="https://www.hospi.vn/uploads/global/favicon.png">
	<link href="<?php echo $theme_url; ?>assets/css/bootstrap-modal.css" rel="stylesheet" media="screen">
	<link href="<?php echo $theme_url; ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="<?php echo $theme_url; ?>assets/css/bootstrap-slider.css" rel="stylesheet" media="screen">
	<link href="<?php echo $theme_url; ?>assets/css/custom.css" rel="stylesheet" media="screen">
	<!-- Duc add css file -->
	<link href="<?php echo $theme_url; ?>style.css" rel="stylesheet" media="screen">
	<link href="<?php echo $theme_url; ?>asset/css/styleNews.css" rel="stylesheet">
	<link href="<?php echo $theme_url; ?>asset/css/Menu.css" rel="stylesheet">
	<link href="<?php echo $theme_url; ?>asset/css/book.css" rel="stylesheet">

	<link href="<?php echo $theme_url; ?>asset/css/responsive-cookbook.css" rel="stylesheet">
	<!-- facebook -------->
	<meta property="og:title" content="Novotel Phú Quốc Resort"/>
	<meta property="og:site_name" content="HOSPI - Đặt phòng khách sạn"/>
	<meta property="og:description" content=""/>
	<meta property="og:publisher" content="https://www.facebook.com/HOSPI - Đặt phòng khách sạn"/>
	<script type="application/ld+json">
		{"@context":"http://schema.org/","@type":"Organization","name":"HOSPI - Đặt phòng khách sạn","url":"https://www.hospi.vn/","logo":"https://www.hospi.vn/uploads/global/favicon.png","sameAs":"https://www.facebook.com/HOSPI - Đặt phòng khách sạn","sameAs":"https://twitter.com/HOSPI - Đặt phòng khách sạn","sameAs":"https://www.pinterest.com/HOSPI - Đặt phòng khách sạn/","sameAs":"https://plus.google.com/u/0/HOSPI - Đặt phòng khách sạn/posts","contactPoint":{"@type":"ContactPoint","telephone":"028 3826 8797","contactType":"Customer Service"}}{"@context":"http://schema.org","@type":"WebSite","name":"HOSPI - Đặt phòng khách sạn","url":"https://www.hospi.vn"}
	</script>
	<!--[if lt IE 9]>
	<script src="<?php echo $theme_url; ?>assets/js/html5shiv.js"></script>
	<script src="<?php echo $theme_url; ?>assets/js/respond.min.js"></script><![endif]-->
	<!-- BASE CSS --------->
	<link href="<?php echo $theme_url; ?>style.css" rel="stylesheet">
	<style> @import "<?php echo $theme_url; ?>childtheme/childstyle.css"; </style>
	<!-- Google Maps ------>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAAgXXrHR9Rf4DY_zdtfkhlqplUtfaOonk&amp;libraries=places"></script>
	<!-- jQuery ----------->
	<script src="<?php echo $theme_url; ?>assets/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo $theme_url; ?>assets/js/wow.min.js"></script>
	<!-- RTL CSS ---------->     <!-- Mobile Redirect -->     <!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>assets/css/font-awesome-ie7.css" media="screen"/>
	<![endif]-->
	<link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/jquery-ui.css"/>
	<style type="text/css">
		.clss-tongthanhtoan {
			border-bottom: none;
		}
	</style>
</head>
<body id="top">
<div id="wait">
	<div class="lds-css ng-scope">
		<div style="width:100%;height:100%" class="lds-flickr">
			<!-- <div class="rotatingwait"></div> -->
			<div class="spinner">
				<div class="dot1"></div>
				<div class="dot2"></div>
				<div class="dot3"></div>
			</div>
		</div>
	</div>
</div>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=159189514584032";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script src="//apis.google.com/js/platform.js" async defer></script>
<!-- Duc add html header-top -->

<div class="navbar navbar-static-top navbar-default navbar-custom margin-bottom-30">
	<div class="container">
		<div class="navbar">
			<!-- Navigation-->
			<div class="col-md-2 col-xs-12">
				<div class="navbar-header go-right logo-mobile">
					<a href="index.html" class="navbar-brand"><img src="<?php echo $theme_url; ?>assets/img/logo.png" alt="HOSPI - Đặt phòng khách sạn" class="logo"/></a>
				</div>

			</div>
			<div class="col-md-10 col-xs-12">
				<div class="col-md-8 margin-top-30 no-margin-top-mobile col-xs-12">
					<div><span class="cl-grey">Hỗ trợ khách hàng (028) 3826 8797</span></div>
					<div><span class="cl-grey">Hotline 09 6868 0106</span></div>
				</div>
				<div class="col-md-4 margin-top-15 col-xs-12">
					<div class="text-right clss-img-combo">
						<img src="<?php echo $theme_url; ?>asset/img/logo-voucher.png" class="img-responsive"/></div>
					<div class="text-right"><span class="cl-grey">Phiếu xác nhận thanh toán</span></div>
					<div class="text-right"><span class="cl-grey">Ngày <?php echo $create_date ?></span></div>
				</div>
			</div>


		</div>
	</div>
</div>
<?php
$this->load->view($main_content);
?>
<!-- END OF CONTENT -->
<div id="waiting"></div>
<style>
	#rotatingImg {
		display: none;
	}

	.booking-bg {
		padding: 10px 0 5px 0;
		width: 100%;
		background-image: url('https://www.hospi.vn<?php echo $theme_url; ?>assets/images/step-bg.png');
		background-color: #222;
		text-align: center;
	}

	.bookingFlow__message {
		color: white;
		font-size: 18px;
		margin-top: 5px;
		margin-bottom: 15px;
		letter-spacing: 1px;
	}

	.select2-choice {
		font-size: 13px !important;
		padding: 0 0 0 10px !important;
	}
</style>
<div class="clearfix"></div>
<script type='text/javascript'>
    $(window).load(function () {
        $('.showInput').css('display', 'none');
        $('.check_ShowInput').change(function () {
            if ($(this).prop("checked")) {
                $('.showInput').css('display', 'none');
            } else {
                $('.showInput').css('display', 'block');
            }
            $('.showInput').fadeToggle();
        });
        $(".payment_method").click(function () {
            $('.completebook').show();
            var gateway = $(this).val();
            $("#response").html("<div id='rotatingDiv'></div>");
            $.ajax({
                url: "https://www.hospi.vn/invoice/getGatewaylink//",
                type: "GET",
                data: {
                    gateway: gateway
                },
                success: function (resp) {
                    var response = $.parseJSON(resp);
                    if (response.iscreditcard == "1") {
                        $(".creditcardform").fadeIn("slow");
                        $("#creditcardgateway").val(response.gateway);
                        $("#response").html("");
                    } else {
                        $(".creditcardform").hide();
                        $("#response").html(response.htmldata);
                        $('#response input').on('change', function () {
                            //alert($('input[name=bank]:checked', '#response').val());
                            var name = $('input[name=bank]:checked', '#response').val();
                            $("#divBankDetails").children().hide();
                            $('#span' + name).show();
                        });
                    }
                }
            });
        });

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        $(".applycoupon").on("click", function () {
            var module = $("#btype").val();
            var itemid = $("#itemid").val();
            var coupon = $(".coupon").val();
            $.ajax({
                url: "https://www.hospi.vn/admin/ajaxcalls/checkCoupon",
                type: 'POST',
                data: {
                    coupon: coupon,
                    module: module,
                    itemid: itemid
                },
                //dataType : 'json',
                success: function (response) {
                    console.log(response);
                    var resp = $.parseJSON(response);
                    if (resp.status == "success") {
                        $("#couponid").val(resp.couponid);
                        $(".couponmsg").html(" <div class='alert alert-success'>Mã giảm giá<strong> " + coupon + " </strong>được áp dụng. Bạn đã giảm được <strong> " + resp.value + resp.type + " </strong>/tổng đơn phòng. Số tiền giảm sẽ thể hiện trong hoá đơn.</div>");
                        $(".coupon").prop("readonly", "readonly");
                        $(".applycoupon").hide();
                        if (resp.type == '%') {
                            var tong_chua_giam = $('#tong_chua_giam').val();
                            var giam_gia = tong_chua_giam * resp.value / 100;
                            $('#giam_gia').val(giam_gia);
                            $('#giam_gia_span').html(addCommas(giam_gia) + ' VND');
                            $('#tong_thanh_toan').val(tong_chua_giam - giam_gia);
                            $('#tong_thanh_toan_span').html(addCommas(tong_chua_giam - giam_gia) + ' VND');
                        }
                    } else {
                        $("#couponid").val("");
                        $(".couponmsg").html("");
                        if (resp.status == "irrelevant") {
                            alert("This coupon is not applicable here");
                        } else {
                            alert("Invalid Coupon");
                        }
                    }
                    console.log(resp);
                }
            });
        });
    });
</script>

<div class="container-fulid bk-tim clss-footer margin-top-15">
	<div class="container ">
		<div class="col-lg-4">&#169; 2018 by HOSIPI TRAVEL CO.LTD</div>
		<div class="col-lg-2"><i class="fa fa-chevron-right" aria-hidden="true"></i> Chính sách bảo mật</div>
		<div class="col-lg-2"><i class="fa fa-chevron-right" aria-hidden="true"></i> Điều khoản sử dụng</div>
		<div class="col-lg-4">Lầu 1,số 124 Khánh Hội,P.6, Quận 4,TP.Hồ Chí Minh</div>
	</div>
</div>


<!-- Angular Data -->
<script src='//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.js'></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-sanitize.js"></script>
<link rel="stylesheet" href="<?php echo $theme_url; ?>asset/include/angucomplete/angucomplete.css"/>
<script src="/assets/include/angucomplete/angucomplete.js"></script>
<script type="text/javascript"> (function () {
        'use strict';
        var app = angular.module('phptravelsApp', ['ngSanitize', 'angucomplete-alt']);
        app.controller('appCtrl', ['$scope', '$http', function appCtrl($scope, $http) {
            var self = this;
            var url = "https://www.hospi.vn/tours/featuredTours/";
            $scope.lg = "6";
            $scope.md = "6";
            $scope.items = [];
            $http.get(url).success(function (data) {
                $scope.items = data;
                $scope.setClasses($scope.items);
            });
            $scope.getData = function (loc) {
                $http.get(url + loc).success(function (data) {
                    $scope.items = data;
                    $scope.setClasses($scope.items);
                });
            };
            $scope.setClasses = function (data) {
                var totalItems = data.length;
                if (totalItems == 1) {
                    $scope.lg = "6 tours12";
                    $scope.md = "6 tours12";
                } else if (totalItems == 2) {
                    $scope.lg = "6";
                    $scope.md = "6";
                } else if (totalItems > 2) {
                    $scope.lg = "6";
                    $scope.md = "6";
                }
            };
        }]);
        app.filter('strLimit', function () {
            'use strict';
            return function (input, limit) {
                if (input) {
                    if (limit > input.length) {
                        return input.slice(0, limit);
                    } else {
                        return input.slice(0, limit) + '...';
                    }
                }
            };
        });
        app.controller('autoSuggest', ['$scope', '$http', function autoSuggest($scope, $http) {
            $scope.searching = "";
            $scope.modType = "";
            $scope.txtSearch = "";
            $scope.remoteUrlRequestFn = function (str) {
                return {q: str};
            };
            $scope.selectedItem = function (selected) {
                $scope.searching = selected.originalObject.id;
                $scope.modType = selected.originalObject.module;
            };
        }]);
    })(); </script>
<!-- End Angular Data -->
<link href="<?php echo $theme_url; ?>assets/include/select2/select2.css" rel="stylesheet"/>
<script src="<?php echo $theme_url; ?>assets/include/select2/select2.min.js"></script>
<!-- This page JS -->
<!-- Custom functions -->
<script src="<?php echo $theme_url; ?>assets/js/functions.js"></script>
<!-- Picker UI-->
<!--<script src="<?php echo $theme_url; ?>assets/js/jquery-ui.js"></script>-->
<script type="text/javascript" src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
<!-- Easing -->
<script src="<?php echo $theme_url; ?>assets/js/jquery.easing.js"></script>
<!-- Nicescroll  -->
<!--<script src="https://www.hospi.vn<?php echo $theme_url; ?>assets/js/jquery.nicescroll.min.js"></script>-->
<!-- CarouFredSel -->
<script src="<?php echo $theme_url; ?>assets/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script src="<?php echo $theme_url; ?>assets/js/helper-plugins/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/helper-plugins/jquery.transit.min.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
<!-- Custom Select -->
<script type='text/javascript' src='<?php echo $theme_url; ?>assets/js/jquery.customSelect.js'></script>
<script src="<?php echo $theme_url; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo $theme_url; ?>assets/js/bootstrap-slider.js"></script>
<script src="<?php echo $theme_url; ?>assets/include/datepicker/datepicker.js"></script>
<link rel="stylesheet" href="<?php echo $theme_url; ?>assets/include/datepicker/datepicker.css"/>
<link rel="stylesheet" href="<?php echo $theme_url; ?>assets/include/datepicker/dp2.css"/>
<script>
    $('#popoverData').popover();
    $('#popoverOption').popover({trigger: "hover"});
</script>
<!-- WOWJs -->
<script>
    //new WOW().init();
</script>
<!-- WOWJs -->
<script>
    var fmt = "dd/mm/yyyy";
    var baseURL = "https://www.hospi.vn/";
    $(function () {
        /* Wish list global function */
        $(".wishlistcheck").on("click", function () {
            var id = $(this).prop('id');
            var module = $(this).data('module');
            var userid = "";
            var action = "add";
            var thisdiv = $(this);
            if ($(this).hasClass('fav')) {
                action = "remove";
            }
            $.post(baseURL + 'account/wishlist/' + action, {
                module: module,
                itemid: id,
                loggedin: userid
            }, function (resp) {
                var response = $.parseJSON(resp);
                if (response.isloggedIn) {
                    if (action == "remove") {
                        $("." + module + "wishsign" + id).html("+");
                        //$("."+module+"wishtext"+id).html("Add to Wishlist");
                        $("." + module + "wishtext" + id).tooltip('hide').attr('data-original-title', "Add to Wishlist").tooltip('fixTitle').tooltip('show');
                        $("." + module + "wishsign" + id).removeClass("fav");
                        thisdiv.removeClass('fav');
                    } else {
                        thisdiv.addClass('fav');
                        $("." + module + "wishsign" + id).addClass("fav");
                        $("." + module + "wishsign" + id).html("-");
                        //$("."+module+"wishtext"+id).html("Remove From Wishlist");
                        $("." + module + "wishtext" + id).tooltip('hide').attr('data-original-title', "Remove From Wishlist").tooltip('fixTitle').tooltip('show');
                    }
                } else {
                    alert("Please Login to add to wishlist.");
                }
                console.log(response);
            });
        })
        /* End Wish list global function */
        /* select2 */
        $('.chosen-select').select2({width: '100%', maximumSelectionSize: 1});
        /* homepage main search auto detector */
        $('.nav-tabs li:first-child').addClass('active');
        var t = $('.nav-tabs li:first-child').data('title');
        $("#" + t).addClass("active in");
        $('.feat li:first-child').addClass('active');
        var t = $('.feat li:first-child').data('title');
        $("#" + t).addClass("active in");
        /* tours ajax categories loader */
        $('#location').on('change', function () {
            var location = $(this).val();
            $.post(baseURL + 'tours/tourajaxcalls/onChangeLocation', {location: location}, function (resp) {
                var response = $.parseJSON(resp);
                console.log(response);
                if (response.hasResult) {
                    $("#tourtype").html(response.optionsList);
                } else {
                    $("#tourtype").html(response.optionsList);
                }
                mySelectUpdate();
            })
        });

        /* cars ajax types loader */
        function parseDate(str) {
            var mdy = str.split('https://www.hospi.vn/')
            return new Date(mdy[2], mdy[1], mdy[0] - 1);
        }

        function daydiff(first, second) {
            return (second - first) / (1000 * 60 * 60 * 24);
        }

        function Padder(len, pad) {
            if (len === undefined) {
                len = 1;
            } else if (pad === undefined) {
                pad = '0';
            }
            var pads = '';
            while (pads.length < len) {
                pads += pad;
            }
            this.pad = function (what) {
                var s = what.toString();
                return pads.substring(0, pads.length - s.length) + s;
            };
        }

        /* tooltip */
        $('[data-toggle=tooltip]').tooltip();
        /* datepicker */
        window.prettyPrint && prettyPrint(), $(".dob").datepicker({
            format: fmt,
            autoclose: !0
        }).on("changeDate", function () {
            $(this).datepicker("hide")
        }), $("#dp1").datepicker(), $("#dp2").datepicker();
        window.prettyPrint && prettyPrint(), $(".dob").datepicker({
            format: fmt,
            autoclose: !0
        }).on("changeDate", function () {
            $(this).datepicker("hide")
        }), $("#dp3").datepicker(), $("#dp4").datepicker();
        /* disabling dates */
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var checkin = $('.dpd1').datepicker({
            format: fmt,
            language: 'vi',
            onRender: function (date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('.dpd2')[0].focus();
            if ($('.dpd2').val() != '' && $('.dpd1').val() != '') {
                var number_night = parseInt(daydiff(parseDate($('.dpd1').val()), parseDate($('.dpd2').val())));
                var zero2 = new Padder(2);
                $('#number_night').html(zero2.pad(number_night));
            }
        }).data('datepicker');
        var checkout = $('.dpd2').datepicker({
            format: fmt,
            onRender: function (date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkout.hide();
            if ($('.dpd2').val() != '' && $('.dpd1').val() != '') {
                var number_night = parseInt(daydiff(parseDate($('.dpd1').val()), parseDate($('.dpd2').val())));
                var zero2 = new Padder(2);
                $('#number_night').html(zero2.pad(number_night));
            }
        }).data('datepicker');
        var checkins = $('.dpd3').datepicker({
            format: fmt,
            language: 'vi',
            onRender: function (date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            if (ev.date.valueOf() > checkouts.date.valueOf()) {
                var newDates = new Date(ev.date)
                newDates.setDate(newDates.getDate() + 1);
                checkouts.setValue(newDates);
            }
            checkins.hide();
            $('.dpd4')[0].focus();
        }).data('datepicker');
        var checkouts = $('.dpd4').datepicker({
            format: fmt,
            onRender: function (date) {
                return date.valueOf() <= checkins.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkouts.hide();
        }).data('datepicker');
        /* Expedia datepicker */
        /* End Expedia Datepicker*/
        /* Dohop datepicker */
        /* End Dohop Datepicker*/
        // Tours checkin - disabling Single date
        var nowTemp4 = new Date();
        var now4 = new Date(nowTemp4.getFullYear(), nowTemp4.getMonth(), nowTemp4.getDate(), 0, 0, 0, 0);
        var checkin4 = $('#tchkin').datepicker({
            format: fmt, onRender: function (date) {
                return date.valueOf() < now4.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            $('#tchkin').datepicker('hide');
        });


        /* Cartrawler datepicker */
        /* End Cartrawler Datepicker*/
        /* Newsletter subscription */
        $(".sub_newsletter").on("click", function () {
            var e = $(".sub_email").val();
            $.post("https://www.hospi.vn/home/subscribe", {email: e}, function (e) {
                $(".subscriberesponse").html(e).fadeIn("slow"), setTimeout(function () {
                    $(".subscriberesponse").fadeOut("slow")
                }, 2000)
            })
        });
        /* dropdown on hover */
        $("ul.nav li.dropdown").hover(function () {
            $(this).find(".dropdown-menu").stop(!0, !0).delay(200).fadeIn(200)
        }, function () {
            $(this).find(".dropdown-menu").stop(!0, !0).delay(200).fadeOut(200)
        });
    });

    /* start change currency functionality */
    function change_currency(c) {
        $("#loadingbg").css("display", "block"), $.post("https://www.hospi.vn/admin/ajaxcalls/changeCurrency", {id: c}, function () {
            location.reload()
        })
    }

    /* map iframe modal */
    function showMap(a, o) {
        "modal" == o ? ($("#mapModal").modal("show"), $("#mapModal").on("shown.bs.modal", function () {
            $("#mapModal .mapContent").html('<iframe src="' + a + '" width="100%" height="450" frameborder="0" style="border:0"></iframe>')
        })) : $("#" + o).html('<iframe src="' + a + '" width="100%" height="450" frameborder="0" style="border:0"></iframe>')
    }
</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-86943600-1', 'auto');
    ga('send', 'pageview');
</script>
<style type="text/css">
	.block-panel-info {
		line-height: 25px;
	}
</style>
</body>
</html>