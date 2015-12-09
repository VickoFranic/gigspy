<div class="col-lg-6">
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
					<p><ok>Registered:</ok> {{ $user['created_at'] }}</p>
				</div>
			</div>
		</div><!-- /inner row -->
		<hr>
		</div>
	</div>
</div>

<div class="col-lg-6">
	<div id="register-wraper">
		<!-- User form -->
		<form id="register-form" class="form" action="{{ url('/dashboard') }}">
			<legend>
				@if (Session::get('old') == true)
				Welcome back, {{ $user['name'] }}.
				<br><br>We hope you enjoy using GigSpy ;)
				@else
				Welcome, {{ $user['name'] }}.
				<br><br>Have a great time using GigSpy ;)
				@endif
				<br><br>
			</legend>
			<div class="footer">
				<button type="submit" class="btn btn-success">Continue</button>
			</div>
		</form>

	</div>
</div>