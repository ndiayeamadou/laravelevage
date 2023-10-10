<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<!-- <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title> -->
		<title>@yield('pageTitle')</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="/dashbtempl/vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="/dashbtempl/vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="/dashbtempl/vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="/dashbtempl/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="/dashbtempl/vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="/dashbtempl/vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script
			async
			src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
			crossorigin="anonymous"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
        <!-- datatable -->
        <link rel="stylesheet" type="text/css"
			href="/dashbtempl/src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link rel="stylesheet" type="text/css"
			href="/dashbtempl/src/plugins/datatables/css/responsive.bootstrap4.min.css"
		/>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->

		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

        @livewireStyles
        <!-- adding stack directive for custom stylesheets -->
        @stack('stylesheets')

	</head>
	<body>
		{{-- <div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="/dashbtempl/vendors/images/deskapp-logo.svg" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div> --}}

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								placeholder="Search Here"
							/>
							<div class="dropdown">
								<a
									class="dropdown-toggle no-arrow"
									href="#"
									role="button"
									data-toggle="dropdown"
								>
									<i class="ion-arrow-down-c"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>From</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">To</label>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>Subject</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="text-right">
										<button class="btn btn-primary">Search</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<i class="icon-copy dw dw-notification"></i>
							<span class="badge notification-active"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="notification-list mx-h-350 customscroll">
								<ul>
									<li>
										<a href="#">
											<img src="/dashbtempl/vendors/images/img.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/dashbtempl/vendors/images/photo1.jpg" alt="" />
											<h3>Lea R. Frith</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/dashbtempl/vendors/images/photo2.jpg" alt="" />
											<h3>Erik L. Richards</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/dashbtempl/vendors/images/photo3.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/dashbtempl/vendors/images/photo4.jpg" alt="" />
											<h3>Renee I. Hansen</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/dashbtempl/vendors/images/img.jpg" alt="" />
											<h3>Vicki M. Coleman</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				{{-- <livewire:admin-user-header-profile-info-comp> --}}
                @livewire('admin-user-header-profile-info-comp')

				<div class="github-link">
					<a href="https://github.com/dropways/deskapp" target="_blank"
						><img src="/dashbtempl/vendors/images/github.svg" alt=""
					/></a>
				</div>
			</div>
		</div>

		{{-- right sidebar --}}
        @include('back.layouts._partials.sidebar-right')

		{{-- letf sidebar --}}
        @include('back.layouts._partials.sidebar-left')

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">

					<div class="">
                        @yield('content')
                    </div>
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					Copyright &copy; 2023
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="/dashbtempl/vendors/scripts/core.js"></script>
		<script src="/dashbtempl/vendors/scripts/script.min.js"></script>
		<script src="/dashbtempl/vendors/scripts/process.js"></script>
		<script src="/dashbtempl/vendors/scripts/layout-settings.js"></script>
        <!-- datatable -->
		<script src="/dashbtempl/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="/dashbtempl/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="/dashbtempl/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="/dashbtempl/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="/dashbtempl/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="/dashbtempl/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="/dashbtempl/src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="/dashbtempl/src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="/dashbtempl/src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="/dashbtempl/src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="/dashbtempl/src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="/dashbtempl/vendors/scripts/datatable-setting.js"></script>

		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<!-- empêcher le retour en arrière
			prevent back history - if using firefox -->
		<script>
			if(navigator.userAgent.indexOf("Firefox") != -1) {
				history.pushState(null, null, document.URL);
				window.addEventListener('popstate', function() {
					history.pushState(null, null, document.URL);
				})
			}
		</script>

		{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        {{-- <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script> --}}
        <script>
            window.addEventListener('showToastr', function(event) {
                toastr.remove();
                if(event.detail.type === 'info') { toastr.info(event.detail.message); }
                else if(event.detail.type === 'success') { toastr.success(event.detail.message); }
                else if(event.detail.type === 'error') { toastr.error(event.detail.message); }
                else if(event.detail.type === 'warning') { toastr.warning(event.detail.message); }
                else { return false; }
            })
        </script>

        @yield('scripts')

        @livewireScripts
        <!-- adding stack directive for custom stylesheets -->
        @stack('scripts')

	</body>
</html>
