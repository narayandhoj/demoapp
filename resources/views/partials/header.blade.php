<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
	<div class="navbar-brand logo">
		<a href="{{url('admin/dashboard')}}" class="d-inline-block">
			<img src="{{ url('images/logo.png') }}" alt="">
		</a>
	</div>

	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">
			@if(Auth::check())
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>	
			</ul>
			<span class="navbar-text ml-md-3 mr-md-auto">
			</span>
			<div class="dropdown-content-header">
				<span class="font-weight-semibold sms_balance"></span>
			</div>
			@endif
			<ul class="navbar-nav">
				@if(Auth::check())
					<li class="nav-item dropdown dropdown-user">
						<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
							<img src="{{ url('images/placeholder-man.jpg') }}" class="rounded-circle" alt="">
							<span>{{ Auth::user()->name }}</span>
						</a>

						<div class="dropdown-menu dropdown-menu-right">
							<a href="{{ url('logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
						</div>
					</li>
				@endif
			</ul>
	</div>
</div>
<!-- /main navbar -->