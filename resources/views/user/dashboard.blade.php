@include('user.header')


<div class="first_column">

	<!-- USER PROFILE BLOCK -->
	<div class="dash-unit">
		<dtitle>User Profile</dtitle>
		<hr>
		<div class="thumbnail">
			<img src="{{ $user->avatar }}" class="img-circle">
		</div><!-- /thumbnail -->
		<h1>{{ $user->name }}</h1>
		<h3>{{ $user->location }}</h3>
	</div>

	<!-- USER BANDS BLOCK -->
	<div class="dash-unit">
		<dtitle>My bands</dtitle>
		<hr>
		@if (Session::get('no_data'))
			<h2>{{ Session::get('no_data') }}</h2>
		@elseif (! isset($pages))
			<h2>You have no band(s) registered yet,<br> do you want to <a href="{{ Session::get('pagesUrl') }}" >add them to GigSpy ?</a></h2>
		@else
		@foreach($pages as $page)
			<ul class="fa-ul">
				<li><i class="fa-li fa fa-plus"></i><a href="/pageData/{{ $page['facebook_id'] }}">{{ $page['name'] }}</a></li>
			</ul>
		@endforeach
		@endif
	</div>

</div><!-- /.first_column -->


@if (isset($activePage))
<!-- BAND INFO BLOCK -->
<div class="second_column">

	<div class="dash-unit">
		<dtitle>BAND INFO</dtitle>
		<hr>
		<div class="thumbnail">
			<img src="{{ $activePage->avatar }}" class="img-circle">
			<h2>{{ $activePage->name }}</h2>
		</div><!-- /thumbnail -->
		<ul class="fa-ul">
			<li><i class="fa-li fa fa-map-marker"></i>{{ $activePage->hometown }}</li>
			<li><i class="fa-li fa fa-globe"></i>{{ $activePage->about }}</li>
			<li><i class="fa-li fa fa-info"></i>{{ $activePage->band_members }}</li>
			<li><i class="fa-li fa fa-users"></i>{{ $activePage->artists_we_like }}</li>
			<li><i class="fa-li fa fa-phone"></i>{{ $activePage->booking_agent }}</li>
			<li><i class="fa-li fa fa-home"></i><a href="{{ $activePage->website }}" target="_blank">{{ $activePage->website }}</a></li>
		</ul>
	</div>
</div>
@endif

@include('user.footer')