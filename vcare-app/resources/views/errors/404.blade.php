
<head>
<link rel="stylesheet" href="{{ asset('assets/styles/strip.css') }}">
<link rel="stylesheet" href="{{ asset('assets/styles/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/color.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/responsive.css') }}">
</head>
	<section>
		<div class="ext-gap bluesh high-opacity">
			<div class="content-bg-wrap" style="background: url({{ asset('assets/img/animated-bg2.png') }})"></div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="top-banner">
							<h1>404</h1>
							<nav class="breadcrumb">
							  <a class="breadcrumb-item" href="?page=home">Home</a>
							  <span class="breadcrumb-item active">error</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- top area animated -->
<section>
		<div class="gap100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="page-eror">
							<img src="{{ asset('assets/img/404.svg') }}" alt="404 error">
							<div class="error-meta">
								<h1>whoops! 404</h1>
								<span>we couldn't find that page </span>
								<a href="{{ route('home') }}" title="" data-ripple="">Go Back Home</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<footer>
<script src="{{ asset('assets/scripts/main.min.js') }}"></script>
<script src="{{ asset('assets/scripts/script.js') }}"></script>
</footer>

