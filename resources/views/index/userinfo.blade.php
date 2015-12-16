<div id="left-side" class="col-lg-6">
	<div class="register-info-wraper">
		<div id="register-info">
			<div class="cont2">
			<div class="thumbnail">
				<img src="{{ $user['avatar'] }}" class="img-circle">
			</div><!-- /thumbnail -->
			<h2>{{ $user['name'] }}</h2>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-12">
				<div class="cont3">
					<p><ok>Username:</ok> {{ $user['name'] }}</p>
					<p><ok>Location:</ok> {{ $user['location'] }}</p>
					<p><ok>Email:</ok> {{ $user['email'] }}</p>
					<p><ok>Last login:</ok> {{ $user['last_login'] }}</p>
				</div>
			</div>
		</div><!-- /inner row -->
		<hr>
		@if($user->role_id == 1)
		<a href="/admin" class="btn btn-info">Admin</a>
		@endif
		<a href="/logout" class="btn btn-primary">Logout</a>
		</div>
	</div>
</div>

<div id="right-side" class="col-lg-6">
	<div id="register-wraper">
		<!-- User form -->
		<form id="register-form" class="form" action="{{ url('/dashboard') }}">
			<legend>
				@if ($user->old == 1)
				Welcome back, {{ $user->name }}.<br>
				<br>We hope you enjoy using GigSpy.<br>
				@else
				Welcome, {{ $user->name }}.
				<br><br>Have a great time using GigSpy, you will love it !
				@endif
				<br>
			</legend>
			<div class="footer">
				<button type="submit" class="btn btn-success">Continue</button>
			</div>
		</form>

	</div>
</div>