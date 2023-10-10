<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
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

        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

        @livewireStyles
        <!-- adding stack directive for custom stylesheets -->
		@stack('stylesheets')

	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.html">
						<img src="/dashbtempl/vendors/images/deskapp-logo.svg" alt="" />
					</a>
				</div>
				<div class="login-menu">
					<ul>
						@if( !Route::is('admin.*') )
							<li><a href="register.html">Inscription</a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="/dashbtempl/vendors/images/login-page-img.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">

                        @yield('content')

					</div>
				</div>
			</div>
		</div>

		<!-- js -->
		<script src="/dashbtempl/vendors/scripts/core.js"></script>
		<script src="/dashbtempl/vendors/scripts/script.min.js"></script>
		<script src="/dashbtempl/vendors/scripts/process.js"></script>
		<script src="/dashbtempl/vendors/scripts/layout-settings.js"></script>

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
        <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
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

        @livewireScripts
        <!-- adding stack directive for custom stylesheets -->
        @stack('scripts')

	</body>
</html>
