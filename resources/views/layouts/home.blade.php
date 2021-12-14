<!DOCTYPE html>
<html lang="en-us" ng-app>
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name') }}</title>
		
		<meta name="description" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/font-awesome.min.css') }}">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/smartadmin-production-plugins.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/smartadmin-production.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/smartadmin-skins.min.css') }}">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/smartadmin-rtl.min.css') }}">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/your_style.css') }}"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/demo.min.css') }}">

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="landing-page/assets/img/favicon.png" type="image/x-icon">
		<link rel="icon" href="landing-page/assets/img/favicon.png" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- ADDED DATA TABLES -->

		<!-- Specifying a Webpage Icon for Web Clip
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="{{ asset('/img/splash/sptouch-icon-iphone.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/splash/touch-icon-ipad.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/img/splash/touch-icon-iphone-retina.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/img/splash/touch-icon-ipad-retina.png') }}">

		<script src="{{ asset('/js/system-scripts/home/timer.js') }}"></script> 

		@stack('styles')

		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/system-styles/styles.css') }}">

		<style>
			.swal2-container {
				zoom: 1.5;
			}
		</style>
	</head>
	<body class="smart-style-0 fixed-page-footer" onload="display_ct();">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> 
					<img src="{{ asset('/img/logo.png') }}" alt="DEPED-CBR-AMS">
				</span>
				<!-- END LOGO PLACEHOLDER -->
			</div>
			

			<!-- projects dropdown -->
			<div class="project-context hidden-xs">

				<span class="label">System Date and Time:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown" id="ct"></span>
			</div>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">

				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->

				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
							<img src="{{ asset('/img/avatars/sunny.png') }}" alt="John Doe" class="online" />
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span>
						<a href="{{ route('logout') }}" title="Sign Out">
							<i class="fa fa-sign-out"></i>
						</a>
					</span>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
				<!-- end logout button -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		@include('layouts.left-navigation')
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
        <div id="main" role="main">
			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment">
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb" id="breadcrumb">
				</ol>
				<!-- end breadcrumb -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				@yield('content')

			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer ">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">{{ config('app.agencyFull') }} - {{ config('app.sdo') }} {{ config('app.name') }}</span>
				</div>
				<div class="col-xs-6 col-sm-6 text-right hidden-xs">
					<div class="txt-color-white inline-block">
						<i class="txt-color-blueLight hidden-mobile"><strong>Developed by:</strong> <a href="https://www.facebook.com/bobby.y.corpuz" target="_blank"><strong>bobszkietotx</strong></a></i>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		@include('layouts.top-navigation')
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<!--  data-pace-options='{ "restartOnRequestAfter": true }'  -->
		<script src="{{ asset('/js/plugin/pace/pace.min.js') }}"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="{{ asset('/js/libs/jquery-3.2.1.min.js') }}"></script>

		<script src="{{ asset('/js/libs/jquery-ui.min.js') }}"></script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="{{ asset('/js/app.config.js') }}"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="{{ asset('/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('/js/bootstrap/bootstrap.min.js') }}"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="{{ asset('/js/notification/SmartNotification.min.js') }}"></script>

		<!-- JARVIS WIDGETS -->
		<script src="{{ asset('/js/smartwidgets/jarvis.widget.min.js') }}"></script>

		<!-- EASY PIE CHARTS -->
		<script src="{{ asset('/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>

		<!-- SPARKLINES -->
		<script src="{{ asset('/js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- JQUERY VALIDATE -->
		<script src="{{ asset('/js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="{{ asset('/js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="{{ asset('/js/plugin/select2/select2.min.js') }}"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="{{ asset('/js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

		<!-- browser msie issue fix -->
		<script src="{{ asset('/js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>

		<!-- FastClick: For mobile devices -->
		<script src="{{ asset('/js/plugin/fastclick/fastclick.min.js') }}"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		{{-- <script src="{{ asset('/js/demo.min.js') }}"></script> --}}

		<!-- MAIN APP JS FILE -->
		<script src="{{ asset('/js/app.min.js') }}"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="{{ asset('/js/speech/voicecommand.min.js') }}"></script>

		<!-- SmartChat UI : plugin -->
		<script src="{{ asset('/js/smart-chat-ui/smart.chat.ui.min.js') }}"></script>
		<script src="{{ asset('/js/smart-chat-ui/smart.chat.manager.min.js') }}"></script>

		<!-- PAGE RELATED PLUGIN(S) -->

		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="{{ asset('/js/plugin/flot/jquery.flot.cust.min.js') }}"></script>
		<script src="{{ asset('/js/plugin/flot/jquery.flot.resize.min.js') }}"></script>
		<script src="{{ asset('/js/plugin/flot/jquery.flot.time.min.js') }}"></script>
		<script src="{{ asset('/js/plugin/flot/jquery.flot.tooltip.min.js') }}"></script>

		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="{{ asset('/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
		<script src="{{ asset('/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

		<!-- Full Calendar -->
		<script src="{{ asset('/js/plugin/moment/moment.min.js') }}"></script>
		<script src="{{ asset('/js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="{{ asset('/js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('/js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
		<script src="{{ asset('/js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
		<script src="{{ asset('/js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
		<script src="{{ asset('/js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>

		<script src="{{ asset('/js/dataTables.rowsGroup.js') }}"></script>

		<script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>

		<script src="{{ asset('/js/highcharts/highcharts.js') }}"></script>
		<script src="{{ asset('/js/highcharts/data.js') }}"></script>
		<script src="{{ asset('/js/highcharts/drilldown.js') }}"></script>
		<script src="{{ asset('/js/highcharts/exporting.js') }}"></script>
		<script src="{{ asset('/js/highcharts/export-data.js') }}"></script>
		<script src="{{ asset('/js/highcharts/accessibility.js') }}"></script>

		<script src="{{ asset('/js/plugin/bootstrap-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>	

		<script src="{{ asset('/js/plugin/superbox/superbox.min.js') }}"></script>

		<script>
			$(document).ready(function() {

				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();

				$('.superbox').SuperBox();

                $("#logout").click(function(e) {
                    $.SmartMessageBox({
                        title : "Are you sure you want to logout?",
                        content : "If logged out, you cannot access the system modules.",
                        buttons : '[No][Yes]'
                    }, function(ButtonPressed) {
                        if (ButtonPressed === "Yes") {
                            document.getElementById('logout-form').submit();
                        }
                        if (ButtonPressed === "No") {
                            $.smallBox({
                                title : "Cancelled!",
                                content : "You may continue to use the system.",
                                color : "#C46A69",
                                iconSmall : "fa fa-times fa-2x fadeInRight animated",
                                timeout : 4000
                            });
                        }
                    });
                    e.preventDefault();
                });

			});
		</script>

		<script src="{{ asset('/js/system-scripts/home/home.js') }}"></script> 
		<!-- uses when a page uses single js -->
		@yield('systemJsFile')
		<!-- uses when a page uses multiple js -->
		@stack('myProfileJs')
	</body>

</html>
